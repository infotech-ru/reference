<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\CharacteristicValueQuery;
use infotech\reference\models\Modification;
use infotech\reference\models\ModificationQuery;
use infotech\reference\models\SerieQuery;
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
        $this->assertEquals(['id_car_modification'], Modification::primaryKey());
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

    public function testGetCharacteristicValues()
    {
        $model = new Modification();
        $this->assertInstanceOf(CharacteristicValueQuery::class, $model->getCharacteristicValues());
    }

    public function testAttributes()
    {
        $model = new Modification();
        $this->assertEquals(
            [
                'id_car_modification',
                'id_car_serie',
                'name',
                'start_production_year',
                'end_production_year',
                'drive_type',
                'engine_type',
                'transmission_type',
                'is_visible',
                'id_car_type',
                'price_min',
                'price_max',
                'package_code',
                'is_recent',
                'origin_id',
                'is_deleted',
            ],
            $model->attributes()
        );
    }

    public function testGetList()
    {
        $this->assertEquals(['1' => '1'], Modification::getList(1, true));
        $this->assertEquals(['1' => '1', '2' => '2'], Modification::getList(1, false));
    }
}