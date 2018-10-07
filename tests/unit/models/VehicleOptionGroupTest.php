<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\VehicleOptionGroup;
use infotech\reference\models\VehicleOptionGroupQuery;
use PHPUnit\Framework\TestCase;

class VehicleOptionGroupTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new VehicleOptionGroup());
    }

    public function testTableName()
    {
        $this->assertEquals('vehicle_option_group', VehicleOptionGroup::tableName());
    }

    public function testPrimaryKey()
    {
        $this->assertEquals(['id'], VehicleOptionGroup::primaryKey());
    }

    public function testFind()
    {
        $this->assertInstanceOf(VehicleOptionGroupQuery::class, VehicleOptionGroup::find());
    }

    public function testAttributes()
    {
        $model = new VehicleOptionGroup();
        $this->assertEquals(
            [
                'id',
                'name',
            ],
            $model->attributes()
        );
    }
}