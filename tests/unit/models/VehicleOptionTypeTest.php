<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\VehicleOptionType;
use infotech\reference\models\VehicleOptionTypeQuery;
use PHPUnit\Framework\TestCase;

class VehicleOptionTypeTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new VehicleOptionType());
    }

    public function testTableName()
    {
        $this->assertEquals('vehicle_option_type', VehicleOptionType::tableName());
    }

    public function testPrimaryKey()
    {
        $this->assertEquals(['id'], VehicleOptionType::primaryKey());
    }

    public function testFind()
    {
        $this->assertInstanceOf(VehicleOptionTypeQuery::class, VehicleOptionType::find());
    }

    public function testAttributes()
    {
        $model = new VehicleOptionType();
        $this->assertEquals(
            [
                'id',
                'group_id',
                'name',
                'values_json',
            ],
            $model->attributes()
        );
    }
}