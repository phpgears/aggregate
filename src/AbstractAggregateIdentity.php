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

use Gears\Immutability\ImmutabilityBehaviour;

/**
 * Base immutable aggregate identity.
 */
abstract class AbstractAggregateIdentity implements AggregateIdentity
{
    use ImmutabilityBehaviour;

    /**
     * Identity value.
     *
     * @var string
     */
    private $value;

    /**
     * AbstractIdentity constructor.
     *
     * @param string $value
     */
    final protected function __construct(string $value)
    {
        $this->checkImmutability();

        $this->value = $value;
    }

    /**
     * {@inheritdoc}
     */
    final public function isEqualTo($identity): bool
    {
        return \is_object($identity)
            && \get_class($identity) === static::class
            && $identity->getValue() === $this->getValue();
    }

    /**
     * {@inheritdoc}
     */
    final public function getValue(): string
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    final public function __toString(): string
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    final public function jsonSerialize(): string
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     *
     * @return string[]
     */
    final protected function getAllowedInterfaces(): array
    {
        return [AggregateIdentity::class];
    }
}
