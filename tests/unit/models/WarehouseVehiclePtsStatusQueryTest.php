<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\ActiveQuery;
use infotech\reference\models\WarehouseVehiclePtsStatus;
use infotech\reference\models\WarehouseVehiclePtsStatusQuery;
use PHPUnit\Framework\TestCase;

class WarehouseVehiclePtsStatusQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new WarehouseVehiclePtsStatusQuery(WarehouseVehiclePtsStatus::class));
    }
}