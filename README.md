[![PHP version](https://img.shields.io/badge/PHP-%3E%3D7.1-8892BF.svg?style=flat-square)](http://php.net)
[![Latest Version](https://img.shields.io/packagist/v/phpgears/aggregate.svg?style=flat-square)](https://packagist.org/packages/phpgears/aggregate)
[![License](https://img.shields.io/github/license/phpgears/aggregate.svg?style=flat-square)](https://github.com/phpgears/aggregate/blob/master/LICENSE)

[![Build Status](https://img.shields.io/travis/phpgears/aggregate.svg?style=flat-square)](https://travis-ci.org/phpgears/aggregate)
[![Style Check](https://styleci.io/repos/149037520/shield)](https://styleci.io/repos/149037520)
[![Code Quality](https://img.shields.io/scrutinizer/g/phpgears/aggregate.svg?style=flat-square)](https://scrutinizer-ci.com/g/phpgears/aggregate)
[![Code Coverage](https://img.shields.io/coveralls/phpgears/aggregate.svg?style=flat-square)](https://coveralls.io/github/phpgears/aggregate)

[![Total Downloads](https://img.shields.io/packagist/dt/phpgears/aggregate.svg?style=flat-square)](https://packagist.org/packages/phpgears/aggregate/stats)
[![Monthly Downloads](https://img.shields.io/packagist/dm/phpgears/aggregate.svg?style=flat-square)](https://packagist.org/packages/phpgears/aggregate/stats)

# Aggregate

Aggregate base

## Installation

### Composer

```
composer require phpgears/aggregate
```

## Usage

Require composer autoload file

```php
require './vendor/autoload.php';
```

### Aggregate identity

By extending `Gears\Aggregate\AbstractAggregateIdentity` you can easily create your own aggregate identities

```php
use Gears\Aggregate\AbstractAggregateIdentity;

class CustomAggregateIdentity extends AbstractAggregateIdentity
{
    public static function fromString(string $value)
    {
        // Check $value validity

        return new static($value);
    }
}
```

Most used aggregate identities are UUID values, for that reason there is already a `Gears\Aggregate\UuidAggregateIdentity` identity ready to be used

If you want to expand on aggregate identities head to [gears/identity](https://github.com/phpgears/identity)

### Aggregate root

Aggregate roots should implement `Gears\Aggregate\AggregateRoot` interface. You can extend from `Gears\Aggregate\AbstractAggregateRoot` for simplicity

```php
use Gears\Aggregate\AbstractAggregateRoot;

class CustomAggregate extends AbstractAggregateRoot
{
    public static function instantiate(AggregateIdentity $identity): self
    {
        return new self($identity);
    }
}
```

Mind that AbstractAggregateRoot constructor is protected forcing you to create static named constructors methods

#### Entities

Entities can implement `Gears\Aggregate\Entity` interface. You can extend from `Gears\Aggregate\AbstractEntity` for simplicity

#### Events

Aggregate roots can record [gears/event](https://github.com/phpgears/event) as operations are performed

```php
use Gears\Aggregate\AbstractAggregateRoot;

class CustomAggregate extends AbstractAggregateRoot
{
    public static function instantiate(AggregateIdentity $identity): self
    {
        return new self($identity);
    }

    public function doSomething(): void
    {
        // do something

        $this->recordEvent(new SomethingHappened());
    }
}
```

This events could later be collected and sent to an event bus such as [gears/event](https://github.com/phpgears/event)

```php
$customAggregate = new UuidAggregate(CustomAggregateIdentity::fromString('4c4316cb-b48b-44fb-a034-90d789966bac'));
$customAggregate->doSomething();

foreach ($customAggregate->collectRecordedEvents() as $event) {
    /** @var \Gears\Event\EventBus $eventBus */
    $eventBus->dispatch($event);
}
```

## Contributing

Found a bug or have a feature request? [Please open a new issue](https://github.com/phpgears/aggregate/issues). Have a look at existing issues before.

See file [CONTRIBUTING.md](https://github.com/phpgears/aggregate/blob/master/CONTRIBUTING.md)

## License

See file [LICENSE](https://github.com/phpgears/aggregate/blob/master/LICENSE) included with the source code for a copy of the license terms.
