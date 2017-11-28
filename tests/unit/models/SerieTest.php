<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\BodyQuery;
use infotech\reference\models\CatalogEmplacementQuery;
use infotech\reference\models\EquipmentQuery;
use infotech\reference\models\GenerationQuery;
use infotech\reference\models\ModificationQuery;
use infotech\reference\models\Serie;
use infotech\reference\models\SerieQuery;
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
        $this->assertEquals(['id_car_serie'], Serie::primaryKey());
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

    public function testGetCatalogEmplacements()
    {
        $model = new Serie();
        $this->assertInstanceOf(CatalogEmplacementQuery::class, $model->getCatalogEmplacements());
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

    public function testGetList()
    {
        $this->assertEquals(['1' => '1'], Serie::getList(1, true));
        $this->assertEquals(['1' => '1', '2' => '2'], Serie::getList(1, false));
    }
}