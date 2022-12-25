<?php

/** @noinspection PhpUnused */

declare(strict_types=1);

namespace Jascha030\TypeCollections;

/**
 * @template T
 *
 * @extends \Jascha030\TypeCollections\ValidatedCollectionInterface<T>
 */
interface TypeCollectionInterface extends ValidatedCollectionInterface
{
    /**
     * @phpstan-return class-string
     *
     * @return class-string<T>|string
     */
    public function getType(): string;
}
