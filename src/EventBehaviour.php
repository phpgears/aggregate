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
use Gears\Event\EventCollection;
use Gears\Event\EventIteratorCollection;

/**
 * Recorded events trait.
 */
trait EventBehaviour
{
    /**
     * @var \ArrayObject
     */
    private $recordedEvents;

    /**
     * Record event.
     *
     * @param Event $event
     */
    final protected function recordEvent(Event $event): void
    {
        if ($this->recordedEvents === null) {
            $this->recordedEvents = new \ArrayObject();
        }

        $this->recordedEvents->append($event);
    }

    /**
     * {@inheritdoc}
     */
    final public function getRecordedEvents(): EventCollection
    {
        $recordedEvents = $this->recordedEvents ?? new \ArrayObject();
        return new EventIteratorCollection($recordedEvents->getIterator());
    }

    /**
     * {@inheritdoc}
     */
    final public function clearRecordedEvents(): void
    {
        $this->recordedEvents = new \ArrayObject();
    }

    /**
     * {@inheritdoc}
     */
    final public function collectRecordedEvents(): EventCollection
    {
        $recordedEvents = $this->recordedEvents ?? new \ArrayObject();
        $events = new EventIteratorCollection($recordedEvents->getIterator());

        $this->recordedEvents = new \ArrayObject();

        return $events;
    }
}
