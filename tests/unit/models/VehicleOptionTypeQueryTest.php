<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\VehicleOptionType;
use infotech\reference\models\VehicleOptionTypeQuery;
use PHPUnit\Framework\TestCase;

class VehicleOptionTypeQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new VehicleOptionTypeQuery(VehicleOptionType::class));
    }
}
