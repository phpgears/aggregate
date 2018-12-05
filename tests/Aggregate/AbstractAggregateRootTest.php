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
use Gears\Aggregate\UuidAggregateIdentity;
use Gears\Event\Event;
use PHPUnit\Framework\TestCase;

/**
 * Abstract aggregate root test.
 */
class AbstractAggregateRootTest extends TestCase
{
    public function testApply(): void
    {
        /** @var Event $event */
        $event = $this->getMockBuilder(Event::class)
            ->disableOriginalConstructor()
            ->getMock();
        $aggregateIdentity = UuidAggregateIdentity::fromString('3247cb6e-e9c7-4f3a-9c6c-0dec26a0353f');

        $aggregateRoot = AbstractAggregateRootStub::instantiateWithEvent($aggregateIdentity, $event);

        $this->assertSame($aggregateIdentity, $aggregateRoot->getIdentity());
        $recordedEvents = $aggregateRoot->collectRecordedEvents();
        $this->assertCount(0, $aggregateRoot->collectRecordedEvents());
        $this->assertCount(1, $recordedEvents);
        $this->assertEquals([$event], \iterator_to_array($recordedEvents));
    }
}
