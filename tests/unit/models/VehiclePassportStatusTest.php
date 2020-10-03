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

    public function testNOT_AVAILABLE()
    {
        $this->assertEquals(0, VehiclePassportStatus::NOT_AVAILABLE);
    }

    public function testPAID()
    {
        $this->assertEquals(1, VehiclePassportStatus::PAID);
    }

    public function testAVAILABLE()
    {
        $this->assertEquals(2, VehiclePassportStatus::AVAILABLE);
    }

    public function testAVAILABLE_IN_BANK()
    {
        $this->assertEquals(3, VehiclePassportStatus::AVAILABLE_IN_BANK);
    }

    public function testORDERED()
    {
        $this->assertEquals(4, VehiclePassportStatus::ORDERED);
    }

    public function testSENT_TO_DEALER()
    {
        $this->assertEquals(5, VehiclePassportStatus::SENT_TO_DEALER);
    }
}
