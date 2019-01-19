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

use Gears\Identity\Identity;

/**
 * Entity interface.
 */
interface Entity
{
    /**
     * Get entity identity.
     *
     * @return Identity
     */
    public function getIdentity(): Identity;
}
