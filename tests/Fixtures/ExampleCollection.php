<?php

declare(strict_types=1);

namespace Jascha030\TypeCollections\Fixtures;

use Jascha030\TypeCollections\TypeCollectionAbstract;

/**
 * @internal
 *
 * @implements TypeCollectionAbstract<ExampleModel>
 */
final class ExampleCollection extends TypeCollectionAbstract
{
    public function getType(): string
    {
        return ExampleModel::class;
    }
}
