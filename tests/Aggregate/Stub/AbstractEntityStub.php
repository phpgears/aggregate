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

use Gears\Aggregate\AbstractEntity;
use Gears\Identity\Identity;

/**
 * Abstract entity stub class.
 */
class AbstractEntityStub extends AbstractEntity
{
    /**
     * @param Identity $identity
     *
     * @return self
     */
    public static function instantiate(Identity $identity): self
    {
        return new self($identity);
    }
}
