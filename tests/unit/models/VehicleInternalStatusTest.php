<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\VehicleInternalStatus;
use infotech\reference\models\VehicleInternalStatusQuery;
use PHPUnit\Framework\TestCase;

class VehicleInternalStatusTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new VehicleInternalStatus());
    }

    public function testTableName()
    {
        $this->assertEquals('vehicle_internal_status', VehicleInternalStatus::tableName());
    }

    public function testPrimaryKey()
    {
        $this->assertEquals(['id'], VehicleInternalStatus::primaryKey());
    }

    public function testFind()
    {
        $this->assertInstanceOf(VehicleInternalStatusQuery::class, VehicleInternalStatus::find());
    }

    public function testAttributes()
    {
        $model = new VehicleInternalStatus();
        $this->assertEquals(
            [
                'id',
                'name',
            ],
            $model->attributes()
        );
    }

    public function testFREE()
    {
        $this->assertEquals(1, VehicleInternalStatus::FREE);
    }

    public function testDELIVERY()
    {
        $this->assertEquals(2, VehicleInternalStatus::DELIVERY);
    }

    public function testRESERVE()
    {
        $this->assertEquals(3, VehicleInternalStatus::RESERVE);
    }

    public function testCONTRACT()
    {
        $this->assertEquals(4, VehicleInternalStatus::CONTRACT);
    }

    public function testTRANSFERRED()
    {
        $this->assertEquals(5, VehicleInternalStatus::TRANSFERRED);
    }

    public function testDELETED()
    {
        $this->assertEquals(6, VehicleInternalStatus::DELETED);
    }

    public function testPREPARATION()
    {
        $this->assertEquals(7, VehicleInternalStatus::PREPARATION);
    }
}
