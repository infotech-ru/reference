<?php

namespace infotech\reference\tests\unit;


use infotech\reference\EmplacementQuery;
use infotech\reference\Equipment;
use infotech\reference\EquipmentQuery;
use infotech\reference\ModelQuery;
use infotech\reference\SerieQuery;
use PHPUnit\Framework\TestCase;

class EquipmentTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new Equipment());
    }

    public function testTableName()
    {
        $this->assertEquals('eqt_equipment', Equipment::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(EquipmentQuery::class, Equipment::find());
    }

    public function testGetModel()
    {
        $model = new Equipment();
        $this->assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testGetSerie()
    {
        $model = new Equipment();
        $this->assertInstanceOf(SerieQuery::class, $model->getSerie());
    }

    public function testGetEmplacements()
    {
        $model = new Equipment();
        $this->assertInstanceOf(EmplacementQuery::class, $model->getEmplacements());
    }
}