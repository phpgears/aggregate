<?php

/*
 * aggregate (https://github.com/phpgears/aggregate).
 * Aggregate base.
 *
 * @license MIT
 * @link https://github.com/phpgears/aggregate
 * @author Julián Gutiérrez <juliangut@gmail.com>
 */

declare(strict_types=1);

namespace Gears\Aggregate\Tests;

use Gears\Aggregate\Tests\Stub\AbstractAggregateRootStub;
use Gears\Event\Event;
use Gears\Identity\UuidIdentity;
use PHPUnit\Framework\TestCase;

/**
 * Abstract aggregate root test.
 */
class AbstractAggregateRootTest extends TestCase
{
    public function testApply(): void
    {
        $aggregateIdentity = UuidIdentity::fromString('3247cb6e-e9c7-4f3a-9c6c-0dec26a0353f');

        $aggregateRoot = AbstractAggregateRootStub::instantiate($aggregateIdentity);

        static::assertSame($aggregateIdentity, $aggregateRoot->getIdentity());
    }

    public function testRecordedEvents(): void
    {
        /** @var Event $event */
        $event = $this->getMockBuilder(Event::class)
            ->disableOriginalConstructor()
            ->getMock();
        $aggregateIdentity = UuidIdentity::fromString('3247cb6e-e9c7-4f3a-9c6c-0dec26a0353f');

        $aggregateRoot = AbstractAggregateRootStub::instantiate($aggregateIdentity);

        static::assertCount(0, $aggregateRoot->getRecordedEvents());

        $aggregateRoot = AbstractAggregateRootStub::instantiateWithEvent($aggregateIdentity, $event);

        static::assertCount(1, $aggregateRoot->getRecordedEvents());
        $aggregateRoot->clearRecordedEvents();
        static::assertCount(0, $aggregateRoot->getRecordedEvents());

        $aggregateRoot = AbstractAggregateRootStub::instantiateWithEvent($aggregateIdentity, $event);

        static::assertCount(1, $aggregateRoot->getRecordedEvents());
        $recordedEvents = $aggregateRoot->collectRecordedEvents();
        static::assertCount(1, $recordedEvents);
        static::assertCount(0, $aggregateRoot->getRecordedEvents());
        static::assertCount(0, $aggregateRoot->collectRecordedEvents());

        static::assertEquals([$event], \iterator_to_array($recordedEvents));
    }
}
