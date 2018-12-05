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

use Gears\Aggregate\Tests\Stub\AbstractAggregateIdentityStub;
use PHPUnit\Framework\TestCase;

/**
 * Abstract aggregate identity test.
 */
class AbstractAggregateIdentityTest extends TestCase
{
    public function testCreation(): void
    {
        $stub = AbstractAggregateIdentityStub::fromString('thisIsMyId');

        $this->assertSame('thisIsMyId', $stub->getValue());
        $this->assertSame('thisIsMyId', (string) $stub);
        $this->assertSame('"thisIsMyId"', \json_encode($stub));
    }

    public function testEquality(): void
    {
        $stub = AbstractAggregateIdentityStub::fromString('thisIsMyId');

        $this->assertTrue($stub->isEqualTo(AbstractAggregateIdentityStub::fromString('thisIsMyId')));
        $this->assertFalse($stub->isEqualTo(AbstractAggregateIdentityStub::fromString('anotherId')));
    }
}
