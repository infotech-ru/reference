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
        $this->assertInstanceOf(ActiveQuery::class, new EquipmentQuery(Equipment::class));
    }

    public function testSerie()
    {
        $query = new EquipmentQuery(Equipment::class);
        $query->serie(1);
        $this->assertEquals(['eqt_equipment.series_id' => 1], $query->where);

        $query = new EquipmentQuery(Equipment::class);
        $query->serie([1, 2]);
        $this->assertEquals(['eqt_equipment.series_id' => [1, 2]], $query->where);
    }

    public function testStatus()
    {
        $query = new EquipmentQuery(Equipment::class);
        $query->status(1);
        $this->assertEquals(['eqt_equipment.status' => 1], $query->where);

        $query = new EquipmentQuery(Equipment::class);
        $query->status([1, 2]);
        $this->assertEquals(['eqt_equipment.status' => [1, 2]], $query->where);
    }
}