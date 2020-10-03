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
        $this->assertNotNull(new CharacteristicValue());
    }

    public function testTableName()
    {
        $this->assertEquals('car_characteristic_value', CharacteristicValue::tableName());
    }

    public function testPrimaryKey()
    {
        $this->assertEquals(['id_car_characteristic_value'], CharacteristicValue::primaryKey());
    }

    public function testFind()
    {
        $this->assertInstanceOf(CharacteristicValueQuery::class, CharacteristicValue::find());
    }

    public function testGetCharacteristic()
    {
        $model = new CharacteristicValue();
        $this->assertInstanceOf(CharacteristicQuery::class, $model->getCharacteristic());
    }

    public function testGetModification()
    {
        $model = new CharacteristicValue();
        $this->assertInstanceOf(ModificationQuery::class, $model->getModification());
    }

    public function testGetEquipment()
    {
        $model = new CharacteristicValue();
        $this->assertInstanceOf(EquipmentQuery::class, $model->getEquipment());
    }

    public function testAttributes()
    {
        $model = new CharacteristicValue();
        $this->assertEquals(
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
