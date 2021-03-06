<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\Modification;
use infotech\reference\models\ModificationQuery;
use PHPUnit\Framework\TestCase;

class ModificationQueryTest extends TestCase
{
    public function testConstructor()
    {
        self::assertInstanceOf(ActiveQuery::class, new ModificationQuery(Modification::class));
    }

    public function testIsRecent()
    {
        $query = new ModificationQuery(Modification::class);
        self::assertEquals($query, $query->isRecent());
        self::assertEquals(['car_modification.is_recent' => true], $query->where);

        $query = new ModificationQuery(Modification::class);
        self::assertEquals($query, $query->isRecent(1));
        self::assertEquals(['car_modification.is_recent' => 1], $query->where);
    }

    public function testIsVisible()
    {
        $query = new ModificationQuery(Modification::class);
        self::assertEquals($query, $query->isVisible());
        self::assertEquals(['car_modification.is_visible' => true], $query->where);

        $query = new ModificationQuery(Modification::class);
        self::assertEquals($query, $query->isVisible(1));
        self::assertEquals(['car_modification.is_visible' => 1], $query->where);
    }

    public function testIsDeleted()
    {
        $query = new ModificationQuery(Modification::class);
        self::assertEquals($query, $query->isDeleted());
        self::assertEquals(['car_modification.is_deleted' => true], $query->where);

        $query = new ModificationQuery(Modification::class);
        self::assertEquals($query, $query->isDeleted(1));
        self::assertEquals(['car_modification.is_deleted' => 1], $query->where);
    }
}
