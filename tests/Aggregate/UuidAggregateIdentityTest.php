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

use Gears\Aggregate\UuidAggregateIdentity;
use PHPUnit\Framework\TestCase;

/**
 * UUID aggregate identity test.
 */
class UuidAggregateIdentityTest extends TestCase
{
    public function testCreation(): void
    {
        $uuid = '4c4316cb-b48b-44fb-a034-90d789966bac';

        $stub = UuidAggregateIdentity::fromString($uuid);

        $this->assertSame($uuid, $stub->getValue());
        $this->assertSame('4c4316cb-b48b-44fb-a034-90d789966bac', (string) $stub);
        $this->assertSame('"4c4316cb-b48b-44fb-a034-90d789966bac"', \json_encode($stub));
    }

    /**
     * @expectedException \Gears\Identity\Exception\InvalidIdentityException
     * @expectedExceptionMessage Provided identifier "invalidId" is not a valid UUID
     */
    public function testInvalidUuid(): void
    {
        UuidAggregateIdentity::fromString('invalidId');
    }
}
