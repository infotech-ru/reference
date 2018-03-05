<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\ActiveQuery;
use infotech\reference\models\VehiclePassportStatus;
use infotech\reference\models\VehiclePassportStatusQuery;
use PHPUnit\Framework\TestCase;

class VehiclePassportStatusQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new VehiclePassportStatusQuery(VehiclePassportStatus::class));
    }
}