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

use Gears\Aggregate\Tests\Stub\AbstractEntityStub;
use Gears\Identity\UuidIdentity;
use PHPUnit\Framework\TestCase;

/**
 * Abstract entity test.
 */
class AbstractEntityTest extends TestCase
{
    public function testCreation(): void
    {
        $identity = UuidIdentity::fromString('30a447f7-72c0-4b43-a0ab-a22fb8ce651d');

        $entity = AbstractEntityStub::instantiate($identity);

        static::assertSame($identity, $entity->getIdentity());
    }
}
