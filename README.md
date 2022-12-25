# Type collections

A small set of interfaces and an abstract implementation, extending the [Collection class](https://laravel.com/docs/9.x/collections) from `illuminate/collections`, used to create collections with predefined content types.

## Getting started

### Prerequisites

* PHP `>=8.0.2`

Having the `phpstan/phpstan` composer package installed globally is not required, but useful.

### Installation

```bash
composer require Jascha030/type-collections
```

## Usage

You can create a "typed" collection class by extending `Jascha030\TypeCollection\TypeCollectionAbstract`, this will require you to implement the `getType` method.

```php
<?php declare(strict_types=1);

namespace Jascha030\TypeCollections;

/**
 * @template T
 *
 * @extends \Jascha030\TypeCollections\ValidatedCollectionInterface<T>
 */
interface TypeCollectionInterface extends ValidatedCollectionInterface
{
    /**
     * @return class-string<T>|string
     */
    public function getType(): string;
}
```

This package also contains the simplest implementation for these interfaces which takes the accepted type as first constructor parameter.

```php
<?php declare(strict_types=1);

use Jascha030\TypeCollections\TypeCollection;
use Jascha030\TypeCollections\Tests\Fixtures\ExampleModel;

$items = [
    new ExampleModel(1),
    new ExampleModel(2),
];

$collection = new TypeCollection(ExampleModel::class, $items);

```

##  PHPStan annotations

This package uses phpstan to annotate your class for better code completion.
You can do this by annotating your class using the `@implements` PHPDoc tag like: `@implements TypeCollectionAbstract<YOUR_CLASS_NAME>`.

You can see how this is done for the `ExampleCollection` class used for unit testing this package below.

```php
<?php declare(strict_types=1);

namespace Jascha030\TypeCollections\Tests\Fixtures;

use Jascha030\TypeCollections\TypeCollectionAbstract;

/**
 * @implements TypeCollectionAbstract<ExampleModel>
 */
final class ExampleCollection extends TypeCollectionAbstract
{
    // ...
}
```
