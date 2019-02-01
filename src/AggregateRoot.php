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

use Gears\Event\EventCollection;
use Gears\Identity\Identity;

/**
 * AggregateRoot interface.
 */
interface AggregateRoot
{
    /**
     * Get aggregate identity.
     *
     * @return Identity
     */
    public function getIdentity(): Identity;

    /**
     * Get recorded events.
     *
     * @return EventCollection
     */
    public function getRecordedEvents(): EventCollection;

    /**
     * Remove recorded events from aggregate root.
     */
    public function clearRecordedEvents(): void;

    /**
     * Collect recorded events and remove them from aggregate root.
     *
     * @return EventCollection
     */
    public function collectRecordedEvents(): EventCollection;
}
