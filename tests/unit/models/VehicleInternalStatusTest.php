<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\VehicleInternalStatus;
use infotech\reference\models\VehicleInternalStatusQuery;
use PHPUnit\Framework\TestCase;

class VehicleInternalStatusTest extends TestCase
{
    public function testConstructor()
    {
        self::assertNotNull(new VehicleInternalStatus());
    }

    public function testTableName()
    {
        self::assertEquals('vehicle_internal_status', VehicleInternalStatus::tableName());
    }

    public function testPrimaryKey()
    {
        self::assertEquals(['id'], VehicleInternalStatus::primaryKey());
    }

    public function testFind()
    {
        self::assertInstanceOf(VehicleInternalStatusQuery::class, VehicleInternalStatus::find());
    }

    public function testAttributes()
    {
        $model = new VehicleInternalStatus();
        self::assertEquals(
            [
                'id',
                'name',
            ],
            $model->attributes()
        );
    }

    public function testFREE()
    {
        self::assertEquals(1, VehicleInternalStatus::FREE);
    }

    public function testDELIVERY()
    {
        self::assertEquals(2, VehicleInternalStatus::DELIVERY);
    }

    public function testRESERVE()
    {
        self::assertEquals(3, VehicleInternalStatus::RESERVE);
    }

    public function testCONTRACT()
    {
        self::assertEquals(4, VehicleInternalStatus::CONTRACT);
    }

    public function testTRANSFERRED()
    {
        self::assertEquals(5, VehicleInternalStatus::TRANSFERRED);
    }

    public function testDELETED()
    {
        self::assertEquals(6, VehicleInternalStatus::DELETED);
    }

    public function testPREPARATION()
    {
        self::assertEquals(7, VehicleInternalStatus::PREPARATION);
    }
}
