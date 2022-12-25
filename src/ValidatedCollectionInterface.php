<?php

declare(strict_types=1);

namespace Jascha030\TypeCollections;

use IteratorAggregate;

/**
 * A Collection of which the contents are validated by a filter before they can be added.
 *
 * @template T
 *
 * @extends IteratorAggregate<T>
 */
interface ValidatedCollectionInterface extends IteratorAggregate
{
    /**
     * Filter callback, validates if a provided item is allowed to be added to the Collection.
     */
    public function validate(mixed $item): bool;
}
