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

namespace Gears\Aggregate;

use Gears\Event\Event;
use Gears\Event\EventArrayCollection;
use Gears\Event\EventCollection;

/**
 * Abstract aggregate root class.
 */
abstract class AbstractAggregateRoot implements AggregateRoot
{
    /**
     * @var AggregateIdentity
     */
    private $identity;

    /**
     * @var Event[]
     */
    private $events = [];

    /**
     * AbstractAggregateRoot constructor.
     *
     * @param AggregateIdentity $identity
     */
    final protected function __construct(AggregateIdentity $identity)
    {
        $this->identity = $identity;
    }

    /**
     * Get aggregate identity.
     *
     * @return AggregateIdentity
     */
    final public function getIdentity(): AggregateIdentity
    {
        return $this->identity;
    }

    /**
     * {@inheritdoc}
     */
    final public function collectRecordedEvents(): EventCollection
    {
        $events = new EventArrayCollection($this->events);

        $this->events = [];

        return $events;
    }

    /**
     * Record event.
     *
     * @param Event $event
     */
    final protected function recordEvent(Event $event): void
    {
        $this->events[] = $event;
    }
}
