<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\VehicleVerificationProgram;
use infotech\reference\models\VehicleVerificationProgramQuery;
use PHPUnit\Framework\TestCase;

class VehicleVerificationProgramQueryTest extends TestCase
{
    public function testConstructor()
    {
        self::assertInstanceOf(
            ActiveQuery::class,
            new VehicleVerificationProgramQuery(VehicleVerificationProgram::class)
        );
    }
}
