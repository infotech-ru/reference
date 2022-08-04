<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\Brand;
use infotech\reference\models\BrandQuery;
use infotech\reference\models\VehicleVerificationProgram;
use infotech\reference\models\VehicleVerificationProgramQuery;
use PHPUnit\Framework\TestCase;

class VehicleVerificationProgramTest extends TestCase
{
    public function testConstructor()
    {
        self::assertNotNull(new VehicleVerificationProgram());
    }

    public function testTableName()
    {
        self::assertEquals('vehicle_verification_program', VehicleVerificationProgram::tableName());
    }

    public function testPrimaryKey()
    {
        self::assertEquals(['id'], VehicleVerificationProgram::primaryKey());
    }

    public function testFind()
    {
        self::assertInstanceOf(VehicleVerificationProgramQuery::class, VehicleVerificationProgram::find());
    }

    public function testAttributes()
    {
        $model = new VehicleVerificationProgram();
        self::assertEquals(
            [
                'id',
                'brand_id',
                'name',
                'description',
                'photo',
                'color',
            ],
            $model->attributes()
        );
    }

    public function testGetPhotoUrl()
    {
        $model = new VehicleVerificationProgram();

        self::assertEquals(null, $model->getPhotoUrl());

        $model->brand_id = Brand::SUBARU_ID;
        $model->photo = VehicleVerificationProgram::BASE_CATALOG_NAME . "/$model->brand_id/subaru-select.png";

        self::assertEquals('http://195004.selcdn.ru/ref/' . $model->photo, $model->getPhotoUrl());
    }

    public function testGetBrand()
    {
        $model = new VehicleVerificationProgram();
        self::assertInstanceOf(BrandQuery::class, $model->getBrand());
    }
}
