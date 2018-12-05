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

use Gears\Aggregate\AbstractAggregateIdentity;

/**
 * Abstract identity stub class.
 */
class AbstractAggregateIdentityStub extends AbstractAggregateIdentity
{
    /**
     * {@inheritdoc}
     */
    public static function fromString(string $value)
    {
        return new static($value);
    }
}
