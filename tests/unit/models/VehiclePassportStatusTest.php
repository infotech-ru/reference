<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\VehiclePassportStatus;
use infotech\reference\models\VehiclePassportStatusQuery;
use PHPUnit\Framework\TestCase;

class VehiclePassportStatusTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new VehiclePassportStatus());
    }

    public function testTableName()
    {
        $this->assertEquals('vehicle_passport_status', VehiclePassportStatus::tableName());
    }

    public function testPrimaryKey()
    {
        $this->assertEquals(['id'], VehiclePassportStatus::primaryKey());
    }

    public function testFind()
    {
        $this->assertInstanceOf(VehiclePassportStatusQuery::class, VehiclePassportStatus::find());
    }

    public function testAttributes()
    {
        $model = new VehiclePassportStatus();
        $this->assertEquals(
            [
                'id',
                'name',
            ],
            $model->attributes()
        );
    }

    public function testNotAvailable()
    {
        $this->assertEquals(0, VehiclePassportStatus::NOT_AVAILABLE);
    }

    public function testPaid()
    {
        $this->assertEquals(1, VehiclePassportStatus::PAID);
    }

    public function testAvailable()
    {
        $this->assertEquals(2, VehiclePassportStatus::AVAILABLE);
    }

    public function testAvailableInBank()
    {
        $this->assertEquals(3, VehiclePassportStatus::AVAILABLE_IN_BANK);
    }

    public function testOrdered()
    {
        $this->assertEquals(4, VehiclePassportStatus::ORDERED);
    }

    public function testSentToDealer()
    {
        $this->assertEquals(5, VehiclePassportStatus::SENT_TO_DEALER);
    }
}
