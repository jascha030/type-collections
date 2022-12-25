<?php

declare(strict_types=1);

namespace Jascha030\TypeCollections;

use Generator;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;

/**
 * @template T
 *
 * @implements \Jascha030\TypeCollections\TypeCollectionInterface<T>
 */
abstract class TypeCollectionAbstract extends Collection implements TypeCollectionInterface
{
    /**
     * @param array|iterable|mixed $items
     */
    public function __construct($items = [], bool $lazy = true)
    {
        parent::__construct(
            $lazy
            ? (new LazyCollection(is_callable($items) ? $items : $this->wrapWithClosure($items)))
                ->filter([$this, 'validate'])
            : (new Collection($items))
                ->filter([$this, 'validate'])
        );
    }

    /**
     * @param mixed $item
     *
     * @throws ReflectionException
     */
    final public function add($item): TypeCollectionAbstract
    {
        if (! $this->validate($item)) {
            return $this;
        }

        return parent::add($item);
    }

    /**
     * {@inheritDoc}
     */
    public function validate($item): bool
    {
        $class = $this->getType();

        return is_subclass_of($item, $this->getType()) || $item instanceof $class;
    }

    /**
     * {@inheritDoc}
     */
    abstract public function getType(): string;

    /**
     * @param array|iterable|mixed $items
     */
    private function wrapWithClosure($items): \Closure
    {
        return function () use ($items): Generator {
            yield from (new Collection($items))
                ->filter([$this, 'validate']);
        };
    }
}
