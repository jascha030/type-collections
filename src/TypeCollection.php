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
    private string $class;

    /**
     * @param class-string         $class
     * @param array|iterable|mixed $items
     */
    public function __construct(string $class, $items = [])
    {
        $this->class = $class;

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
