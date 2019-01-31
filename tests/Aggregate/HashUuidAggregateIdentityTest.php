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

use Gears\Aggregate\HashUuidAggregateIdentity;
use PHPUnit\Framework\TestCase;

/**
 * Hashed UUID aggregate identity test.
 */
class HashUuidAggregateIdentityTest extends TestCase
{
    public function testCreation(): void
    {
        $hashedUuid = 'gqYxv3lMPXSEkGoonzDZtMNwE4Q';
        $stub = HashUuidAggregateIdentity::fromString($hashedUuid);

        $this->assertSame($hashedUuid, $stub->getValue());
        $this->assertSame($hashedUuid, (string) $stub);
    }

    /**
     * @expectedException \Gears\Identity\Exception\InvalidIdentityException
     * @expectedExceptionMessage Provided identity value "invalidHashedUUID" is not a valid hashed UUID
     */
    public function testInvalidShortUuid(): void
    {
        HashUuidAggregateIdentity::fromString('invalidHashedUUID');
    }

    /**
     * @expectedException \Gears\Identity\Exception\InvalidIdentityException
     * @expectedExceptionMessage Provided identity value "gGJqXEqR7AFZjBkzP9MLtWYP9AA" is not a valid hashed UUID
     */
    public function testNonRFC4122Uuid(): void
    {
        HashUuidAggregateIdentity::fromString('gGJqXEqR7AFZjBkzP9MLtWYP9AA');
    }
}
