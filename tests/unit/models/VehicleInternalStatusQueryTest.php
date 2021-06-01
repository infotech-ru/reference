<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\VehicleInternalStatus;
use infotech\reference\models\VehicleInternalStatusQuery;
use PHPUnit\Framework\TestCase;

class VehicleInternalStatusQueryTest extends TestCase
{
    public function testConstructor()
    {
        self::assertInstanceOf(ActiveQuery::class, new VehicleInternalStatusQuery(VehicleInternalStatus::class));
    }
}
