<?php

declare(strict_types=1);

namespace Jascha030\TypeCollections\Fixtures;

/**
 * Fixture used to test TypeCollectionAbstract.
 *
 * @internal
 */
final class ExampleModel
{
    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
