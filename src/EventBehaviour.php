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
 * Recorded events trait.
 */
trait EventBehaviour
{
    /**
     * @var Event[]
     */
    private $recordedEvents = [];

    /**
     * Record event.
     *
     * @param Event $event
     */
    final protected function recordEvent(Event $event): void
    {
        $this->recordedEvents[] = $event;
    }

    /**
     * {@inheritdoc}
     */
    final public function getRecordedEvents(): EventCollection
    {
        return new EventArrayCollection($this->recordedEvents);
    }

    /**
     * {@inheritdoc}
     */
    final public function clearRecordedEvents(): void
    {
        $this->recordedEvents = [];
    }

    /**
     * {@inheritdoc}
     */
    final public function collectRecordedEvents(): EventCollection
    {
        $events = new EventArrayCollection($this->recordedEvents);

        $this->recordedEvents = [];

        return $events;
    }
}
