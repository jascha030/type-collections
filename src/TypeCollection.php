<?php

declare(strict_types=1);

namespace Jascha030\TypeCollections;

/**
 * @template T
 *
 * @extends TypeCollectionAbstract<T>
 */
class TypeCollection extends TypeCollectionAbstract
{
    /**
     * @param class-string         $class
     * @param array|iterable|mixed $items
     */
    public function __construct(private string $class, $items = [])
    {
        parent::__construct($items);
    }

    /**
     * {@inheritDoc}
     */
    public function getType(): string
    {
        return $this->class;
    }
}
