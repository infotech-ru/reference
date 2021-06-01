<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\VehicleOptionGroup;
use infotech\reference\models\VehicleOptionGroupQuery;
use PHPUnit\Framework\TestCase;

class VehicleOptionGroupQueryTest extends TestCase
{
    public function testConstructor()
    {
        self::assertInstanceOf(ActiveQuery::class, new VehicleOptionGroupQuery(VehicleOptionGroup::class));
    }
}
