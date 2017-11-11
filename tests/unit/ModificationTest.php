<?php

namespace infotech\reference\tests\unit;


use infotech\reference\Modification;
use infotech\reference\ModificationQuery;
use infotech\reference\SerieQuery;
use PHPUnit\Framework\TestCase;

class ModificationTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new Modification());
    }

    public function testTableName()
    {
        $this->assertEquals('car_modification', Modification::tableName());
    }

    public function testPrimaryKey()
    {
        $this->assertEquals('id_car_modification', Modification::primaryKey());
    }

    public function testFind()
    {
        $this->assertInstanceOf(ModificationQuery::class, Modification::find());
    }

    public function testGetSerie()
    {
        $model = new Modification();
        $this->assertInstanceOf(SerieQuery::class, $model->getSerie());
    }
}