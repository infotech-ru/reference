<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\Characteristic;
use infotech\reference\models\CharacteristicQuery;
use PHPUnit\Framework\TestCase;

class CharacteristicTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new Characteristic());
    }

    public function testTableName()
    {
        $this->assertEquals('car_characteristic', Characteristic::tableName());
    }

    public function testPrimaryKey()
    {
        $this->assertEquals(['id_car_characteristic'], Characteristic::primaryKey());
    }

    public function testFind()
    {
        $this->assertInstanceOf(CharacteristicQuery::class, Characteristic::find());
    }

    public function testGetParent()
    {
        $model = new Characteristic();
        $this->assertInstanceOf(CharacteristicQuery::class, $model->getParent());
    }

    public function testAttributes()
    {
        $model = new Characteristic();
        $this->assertEquals(
            [
                'id_car_characteristic',
                'name',
                'id_parent',
                'id_car_type',
                'is_main',
                'origin_id',
            ],
            $model->attributes()
        );
    }
}