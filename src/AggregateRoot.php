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

/**
 * AggregateRoot interface.
 */
interface AggregateRoot
{
    /**
     * Get aggregate identity.
     *
     * @return AggregateIdentity
     */
    public function getIdentity(): AggregateIdentity;

    /**
     * Collect recorded events and remove them from aggregate root.
     *
     * @return EventCollection
     */
    public function collectRecordedEvents(): EventCollection;
}
