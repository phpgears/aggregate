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
use PascalDeVink\ShortUuid\ShortUuid;
use Ramsey\Uuid\Uuid;

/**
 * Base immutable short UUID aggregate identity.
 */
class ShortUuidAggregateIdentity extends AbstractAggregateIdentity
{
    /**
     * {@inheritdoc}
     *
     * @throws InvalidIdentityException
     */
    public static function fromString(string $value)
    {
        $uuid = (new ShortUuid())->decode($value);
        if ($uuid->getVariant() !== Uuid::RFC_4122 || !\in_array($uuid->getVersion(), \range(1, 5), true)) {
            throw new InvalidIdentityException(
                \sprintf('Provided identity value "%s" is not a valid short UUID', $value)
            );
        }

        return new static($value);
    }
}
