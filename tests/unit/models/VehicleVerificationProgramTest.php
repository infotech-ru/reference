<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\VehicleVerificationProgram;
use infotech\reference\models\VehicleVerificationProgramQuery;
use PHPUnit\Framework\TestCase;

class VehicleVerificationProgramTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new VehicleVerificationProgram());
    }

    public function testTableName()
    {
        $this->assertEquals('vehicle_verification_program', VehicleVerificationProgram::tableName());
    }

    public function testPrimaryKey()
    {
        $this->assertEquals(['brand_id'], VehicleVerificationProgram::primaryKey());
    }

    public function testFind()
    {
        $this->assertInstanceOf(VehicleVerificationProgramQuery::class, VehicleVerificationProgram::find());
    }

    public function testAttributes()
    {
        $model = new VehicleVerificationProgram();
        $this->assertEquals(
            [
                'brand_id',
                'name',
                'description',
                'photo',
            ],
            $model->attributes()
        );
    }
}