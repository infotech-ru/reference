<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\VehiclePassportStatus;
use infotech\reference\models\VehiclePassportStatusQuery;
use PHPUnit\Framework\TestCase;

class VehiclePassportStatusTest extends TestCase
{
    public function testConstructor()
    {
        self::assertNotNull(new VehiclePassportStatus());
    }

    public function testTableName()
    {
        self::assertEquals('vehicle_passport_status', VehiclePassportStatus::tableName());
    }

    public function testPrimaryKey()
    {
        self::assertEquals(['id'], VehiclePassportStatus::primaryKey());
    }

    public function testFind()
    {
        self::assertInstanceOf(VehiclePassportStatusQuery::class, VehiclePassportStatus::find());
    }

    public function testAttributes()
    {
        $model = new VehiclePassportStatus();
        self::assertEquals(
            [
                'id',
                'name',
            ],
            $model->attributes()
        );
    }

    public function testNotAvailable()
    {
        self::assertEquals(0, VehiclePassportStatus::NOT_AVAILABLE);
    }

    public function testPaid()
    {
        self::assertEquals(1, VehiclePassportStatus::PAID);
    }

    public function testAvailable()
    {
        self::assertEquals(2, VehiclePassportStatus::AVAILABLE);
    }

    public function testAvailableInBank()
    {
        self::assertEquals(3, VehiclePassportStatus::AVAILABLE_IN_BANK);
    }

    public function testOrdered()
    {
        self::assertEquals(4, VehiclePassportStatus::ORDERED);
    }

    public function testSentToDealer()
    {
        self::assertEquals(5, VehiclePassportStatus::SENT_TO_DEALER);
    }
}
