<?php

declare(strict_types=1);

namespace Jascha030\TypeCollections;

use PHPUnit\Framework\TestCase;
use Jascha030\TypeCollections\Fixtures\ExampleModel;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertInstanceOf;

/**
 * @covers \Jascha030\TypeCollections\TypeCollection
 * @covers \Jascha030\TypeCollections\TypeCollectionAbstract
 *
 * @internal
 */
final class TypeCollectionTest extends TestCase
{
    public function testConstruct(): void
    {
        assertInstanceOf(TypeCollectionAbstract::class, new TypeCollection(ExampleModel::class, [
            new ExampleModel(1),
            new ExampleModel(2),
        ]));
    }

    /**
     * @depends testConstruct
     */
    public function testGetType(): void
    {
        assertEquals(ExampleModel::class, (new TypeCollection(ExampleModel::class, []))->getType());
    }
}
