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
 * Abstract aggregate root class.
 */
abstract class AbstractAggregateRoot implements AggregateRoot
{
    use EventBehaviour;

    /**
     * @var Identity
     */
    private $identity;

    /**
     * AbstractAggregateRoot constructor.
     *
     * @param Identity $identity
     */
    final protected function __construct(Identity $identity)
    {
        $this->identity = $identity;
    }

    /**
     * {@inheritdoc}
     */
    final public function getIdentity(): Identity
    {
        return $this->identity;
    }
}
