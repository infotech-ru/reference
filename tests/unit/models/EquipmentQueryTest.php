<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\Equipment;
use infotech\reference\models\EquipmentQuery;
use PHPUnit\Framework\TestCase;

class EquipmentQueryTest extends TestCase
{
    public function testConstructor()
    {
        self::assertInstanceOf(ActiveQuery::class, new EquipmentQuery(Equipment::class));
    }

    public function testSerie()
    {
        $query = new EquipmentQuery(Equipment::class);
        self::assertEquals($query, $query->serie(1));
        self::assertEquals(['eqt_equipment.series_id' => 1], $query->where);

        $query = new EquipmentQuery(Equipment::class);
        self::assertEquals($query, $query->serie([1, 2]));
        self::assertEquals(['eqt_equipment.series_id' => [1, 2]], $query->where);
    }

    public function testStatus()
    {
        $query = new EquipmentQuery(Equipment::class);
        self::assertEquals($query, $query->status(1));
        self::assertEquals(['eqt_equipment.status' => 1], $query->where);

        $query = new EquipmentQuery(Equipment::class);
        self::assertEquals($query, $query->status([1, 2]));
        self::assertEquals(['eqt_equipment.status' => [1, 2]], $query->where);
    }
}
