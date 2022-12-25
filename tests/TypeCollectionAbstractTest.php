<?php

declare(strict_types=1);

namespace Jascha030\TypeCollections;

use Jascha030\TypeCollections\Fixtures\ExampleCollection;
use Jascha030\TypeCollections\Fixtures\ExampleModel;
use PHPUnit\Framework\TestCase;
use stdClass;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertInstanceOf;
use function PHPUnit\Framework\assertTrue;

/**
 * @covers \Jascha030\TypeCollections\TypeCollectionAbstract
 *
 * @internal
 */
final class TypeCollectionAbstractTest extends TestCase
{
    public function testConstruct(): void
    {
        assertInstanceOf(TypeCollectionInterface::class, new ExampleCollection($this->getItems()));
        assertInstanceOf(TypeCollectionInterface::class, new ExampleCollection($this->getItems(), false));
        assertInstanceOf(TypeCollectionInterface::class, new ExampleCollection(function () {
            yield from $this->getItems();
        }));
    }

    /**
     * @depends testValidate
     */
    public function testIteration(): void
    {
        $collection = $this->getCollection();
        $count      = 0;

        foreach ($collection as $item) {
            assertInstanceOf(ExampleModel::class, $item);
            assertEquals($count, $item->getId());
            ++$count;
        }
    }

    /**
     * @depends testConstruct
     */
    public function testAdd(): void
    {
        $collection = $this->getCollection();

        assertInstanceOf(TypeCollectionAbstract::class, $collection->add(new ExampleModel(1)));
        $count = $collection->count();

        assertInstanceOf(TypeCollectionAbstract::class, $collection->add(new stdClass()));
        assertEquals($count, $collection->count());
    }

    /**
     * @depends testConstruct
     */
    public function testGetType(): void
    {
        assertEquals(ExampleModel::class, $this->getCollection()->getType());
    }

    /**
     * @depends testConstruct
     */
    public function testValidate(): void
    {
        $collection = $this->getCollection();

        assertTrue($collection->validate(new ExampleModel(6)));
    }

    private function getCollection(): TypeCollectionAbstract
    {
        return new ExampleCollection($this->getItems());
    }

    private function getItems(): array
    {
        $items = [];

        for ($i = 0; $i <= 5; ++$i) {
            $items[] = new ExampleModel($i);
        }

        return $items;
    }
}
