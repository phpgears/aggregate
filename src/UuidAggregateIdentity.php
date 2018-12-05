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

use Gears\Identity\Exception\InvalidIdentityException;
use Ramsey\Uuid\Uuid;

/**
 * Base immutable UUID aggregate identity.
 */
class UuidAggregateIdentity extends AbstractAggregateIdentity
{
    /**
     * {@inheritdoc}
     *
     * @throws InvalidIdentityException
     */
    public static function fromString(string $value)
    {
        if (!Uuid::isValid($value)) {
            throw new InvalidIdentityException(
                \sprintf('Provided identifier "%s" is not a valid UUID', $value)
            );
        }

        return new static($value);
    }
}
