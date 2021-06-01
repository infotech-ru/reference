<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\Characteristic;
use infotech\reference\models\CharacteristicQuery;
use PHPUnit\Framework\TestCase;

class CharacteristicTest extends TestCase
{
    public function testConstructor()
    {
        self::assertNotNull(new Characteristic());
    }

    public function testTableName()
    {
        self::assertEquals('car_characteristic', Characteristic::tableName());
    }

    public function testPrimaryKey()
    {
        self::assertEquals(['id_car_characteristic'], Characteristic::primaryKey());
    }

    public function testFind()
    {
        self::assertInstanceOf(CharacteristicQuery::class, Characteristic::find());
    }

    public function testGetParent()
    {
        $model = new Characteristic();
        self::assertInstanceOf(CharacteristicQuery::class, $model->getParent());
        self::assertNull($model->parent);
    }

    public function testAttributes()
    {
        $model = new Characteristic();
        self::assertEquals(
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
