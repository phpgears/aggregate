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

namespace Gears\Aggregate\Tests;

use Gears\Aggregate\ShortUuidAggregateIdentity;
use PHPUnit\Framework\TestCase;

/**
 * Short UUID aggregate identity test.
 */
class ShortUuidAggregateIdentityTest extends TestCase
{
    public function testCreation(): void
    {
        $shortUuid = 'QuwMZbb9f3ccpacCPmVRaF';
        $stub = ShortUuidAggregateIdentity::fromString($shortUuid);

        $this->assertSame($shortUuid, $stub->getValue());
        $this->assertSame($shortUuid, (string) $stub);
    }

    /**
     * @expectedException \Gears\Identity\Exception\InvalidIdentityException
     * @expectedExceptionMessage Provided identity value "invalidShortUUID" is not a valid short UUID
     */
    public function testInvalidShortUuid(): void
    {
        ShortUuidAggregateIdentity::fromString('invalidShortUUID');
    }

    /**
     * @expectedException \Gears\Identity\Exception\InvalidIdentityException
     * @expectedExceptionMessage Provided identity value "zaDP55gm3yL9cV2D" is not a valid short UUID
     */
    public function testNonRFC4122Uuid(): void
    {
        ShortUuidAggregateIdentity::fromString('zaDP55gm3yL9cV2D');
    }
}
