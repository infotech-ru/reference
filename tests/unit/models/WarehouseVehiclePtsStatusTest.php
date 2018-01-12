<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\WarehouseVehiclePtsStatus;
use infotech\reference\models\WarehouseVehiclePtsStatusQuery;
use PHPUnit\Framework\TestCase;

class WarehouseVehiclePtsStatusTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new WarehouseVehiclePtsStatus());
    }

    public function testTableName()
    {
        $this->assertEquals('warehouse_vehicle_pts_status', WarehouseVehiclePtsStatus::tableName());
    }

    public function testPrimaryKey()
    {
        $this->assertEquals(['id'], WarehouseVehiclePtsStatus::primaryKey());
    }

    public function testFind()
    {
        $this->assertInstanceOf(WarehouseVehiclePtsStatusQuery::class, WarehouseVehiclePtsStatus::find());
    }

    public function testAttributes()
    {
        $model = new WarehouseVehiclePtsStatus();
        $this->assertEquals(
            [
                'id',
                'name',
            ],
            $model->attributes()
        );
    }

    public function testNOT_AVAILABLE()
    {
        $this->assertEquals(0, WarehouseVehiclePtsStatus::NOT_AVAILABLE);
    }

    public function testPAID()
    {
        $this->assertEquals(1, WarehouseVehiclePtsStatus::PAID);
    }

    public function testAVAILABLE()
    {
        $this->assertEquals(2, WarehouseVehiclePtsStatus::AVAILABLE);
    }

    public function testAVAILABLE_IN_BANK()
    {
        $this->assertEquals(3, WarehouseVehiclePtsStatus::AVAILABLE_IN_BANK);
    }

    public function testORDERED()
    {
        $this->assertEquals(4, WarehouseVehiclePtsStatus::ORDERED);
    }

    public function testSENT_TO_DEALER()
    {
        $this->assertEquals(5, WarehouseVehiclePtsStatus::SENT_TO_DEALER);
    }
}