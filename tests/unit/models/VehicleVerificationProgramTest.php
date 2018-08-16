<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\Brand;
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
                'id',
                'brand_id',
                'name',
                'description',
                'photo',
            ],
            $model->attributes()
        );
    }

    public function testGetPhotoUrl()
    {
        $model = new VehicleVerificationProgram();

        $this->assertEquals(null, $model->getPhotoUrl());

        $model->brand_id = Brand::SUBARU_ID;
        $model->photo = VehicleVerificationProgram::BASE_CATALOG_NAME . "/$model->brand_id/subaru-select.png";

        $this->assertEquals('http://195004.selcdn.com/ref/' . $model->photo, $model->getPhotoUrl());
    }
}