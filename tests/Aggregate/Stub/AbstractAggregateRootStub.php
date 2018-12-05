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

namespace Gears\Aggregate\Tests\Stub;

use Gears\Aggregate\AbstractAggregateRoot;
use Gears\Aggregate\AggregateIdentity;
use Gears\Event\Event;

/**
 * Abstract aggregate root stub class.
 */
class AbstractAggregateRootStub extends AbstractAggregateRoot
{
    /**
     * @param AggregateIdentity $identity
     * @param Event             $event
     *
     * @return self
     */
    public static function instantiateWithEvent(AggregateIdentity $identity, Event $event): self
    {
        $aggregateRoot = new self($identity);

        $aggregateRoot->recordEvent($event);

        return $aggregateRoot;
    }
}
