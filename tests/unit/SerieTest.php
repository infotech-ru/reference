<?php

namespace infotech\reference\tests\unit;


use infotech\reference\BodyQuery;
use infotech\reference\EmplacementQuery;
use infotech\reference\EquipmentQuery;
use infotech\reference\GenerationQuery;
use infotech\reference\ModificationQuery;
use infotech\reference\Serie;
use infotech\reference\SerieQuery;
use PHPUnit\Framework\TestCase;

class SerieTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new Serie());
    }

    public function testTableName()
    {
        $this->assertEquals('car_serie', Serie::tableName());
    }

    public function testPrimaryKey()
    {
        $this->assertEquals('id_car_serie', Serie::primaryKey());
    }

    public function testFind()
    {
        $this->assertInstanceOf(SerieQuery::class, Serie::find());
    }

    public function testGetGeneration()
    {
        $model = new Serie();
        $this->assertInstanceOf(GenerationQuery::class, $model->getGeneration());
    }

    public function testGetBody()
    {
        $model = new Serie();
        $this->assertInstanceOf(BodyQuery::class, $model->getBody());
    }

    public function testGetModifications()
    {
        $model = new Serie();
        $this->assertInstanceOf(ModificationQuery::class, $model->getModifications());
    }

    public function testGetEquipments()
    {
        $model = new Serie();
        $this->assertInstanceOf(EquipmentQuery::class, $model->getEquipments());
    }

    public function testGetEmplacements()
    {
        $model = new Serie();
        $this->assertInstanceOf(EmplacementQuery::class, $model->getEmplacements());
    }

    public function testAttributes()
    {
        $model = new Serie();
        $this->assertEquals(
            [
                'id_car_serie',
                'model_id',
                'name',
                'is_visible',
                'id_car_generation',
                'id_car_type',
                'body_id',
                'is_recent',
                'origin_id',
            ],
            $model->attributes()
        );
    }
}