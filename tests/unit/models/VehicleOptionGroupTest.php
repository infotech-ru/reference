<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\VehicleOptionGroup;
use infotech\reference\models\VehicleOptionGroupQuery;
use infotech\reference\models\VehicleOptionTypeQuery;
use PHPUnit\Framework\TestCase;

class VehicleOptionGroupTest extends TestCase
{
    public function testConstructor()
    {
        self::assertNotNull(new VehicleOptionGroup());
    }

    public function testTableName()
    {
        self::assertEquals('vehicle_option_group', VehicleOptionGroup::tableName());
    }

    public function testPrimaryKey()
    {
        self::assertEquals(['id'], VehicleOptionGroup::primaryKey());
    }

    public function testFind()
    {
        self::assertInstanceOf(VehicleOptionGroupQuery::class, VehicleOptionGroup::find());
    }

    public function testAttributes()
    {
        $model = new VehicleOptionGroup();
        self::assertEquals(
            [
                'id',
                'name',
                'code',
            ],
            $model->attributes()
        );
    }

    public function testGetTypes()
    {
        $model = new VehicleOptionGroup();
        self::assertInstanceOf(VehicleOptionTypeQuery::class, $model->getTypes());
    }

    public function testGetCodesList()
    {
        self::assertEquals(
            [
                'multimedia' => 'Мультимедиа',
                'comfort' => 'Комфорт',
                'safety' => 'Безопасность',
                'visibility' => 'Обзор',
                'exterior_elements' => 'Элементы экстерьера',
                'anti_theft' => 'Защита от угона',
                'interior' => 'Салон',
            ],
            VehicleOptionGroup::getCodesList()
        );
    }
}
