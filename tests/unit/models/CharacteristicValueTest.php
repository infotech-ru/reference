<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\CharacteristicQuery;
use infotech\reference\models\CharacteristicValue;
use infotech\reference\models\CharacteristicValueQuery;
use infotech\reference\models\EquipmentQuery;
use infotech\reference\models\ModificationQuery;
use PHPUnit\Framework\TestCase;

class CharacteristicValueTest extends TestCase
{
    public function testConstructor()
    {
        self::assertNotNull(new CharacteristicValue());
    }

    public function testTableName()
    {
        self::assertEquals('car_characteristic_value', CharacteristicValue::tableName());
    }

    public function testPrimaryKey()
    {
        self::assertEquals(['id_car_characteristic_value'], CharacteristicValue::primaryKey());
    }

    public function testFind()
    {
        self::assertInstanceOf(CharacteristicValueQuery::class, CharacteristicValue::find());
    }

    public function testGetCharacteristic()
    {
        $model = new CharacteristicValue();
        self::assertInstanceOf(CharacteristicQuery::class, $model->getCharacteristic());
    }

    public function testGetModification()
    {
        $model = new CharacteristicValue();
        self::assertInstanceOf(ModificationQuery::class, $model->getModification());
    }

    public function testGetEquipment()
    {
        $model = new CharacteristicValue();
        self::assertInstanceOf(EquipmentQuery::class, $model->getEquipment());
    }

    public function testAttributes()
    {
        $model = new CharacteristicValue();
        self::assertEquals(
            [
                'id_car_characteristic_value',
                'value',
                'unit',
                'id_car_characteristic',
                'id_car_modification',
                'id_car_equipment',
                'is_visible',
                'id_car_type',
                'origin_id',
            ],
            $model->attributes()
        );
    }
}
