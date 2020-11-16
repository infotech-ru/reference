<?php

namespace infotech\reference\tests\unit\models\aeb;

use infotech\reference\models\aeb\AEBRegion;
use infotech\reference\models\BrandQuery;
use infotech\reference\models\CityQuery;
use infotech\reference\models\FederalDistrictQuery;
use infotech\reference\models\ModelQuery;
use infotech\reference\models\RegionQuery;
use PHPUnit\Framework\TestCase;
use yii\db\ActiveQuery;

class AEBRegionTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new AEBRegion());
    }

    public function testTableName()
    {
        $this->assertEquals('aeb_region', AEBRegion::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(ActiveQuery::class, AEBRegion::find());
    }

    public function testAttributes()
    {
        $model = new AEBRegion();
        $this->assertEquals(
            [
                'id',
                'year',
                'brand_id',
                'model_id',
                'federal_district_id',
                'region_id',
                'city_id',
                'month',
                'value',
                'created_at',
                'segment',
            ],
            $model->attributes()
        );
    }

    public function testGetBrand()
    {
        $model = new AEBRegion();
        $this->assertInstanceOf(BrandQuery::class, $model->getBrand());
    }

    public function testGetModel()
    {
        $model = new AEBRegion();
        $this->assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testGetFederalDistrict()
    {
        $model = new AEBRegion();
        $this->assertInstanceOf(FederalDistrictQuery::class, $model->getFederalDistrict());
    }

    public function testGetRegion()
    {
        $model = new AEBRegion();
        $this->assertInstanceOf(RegionQuery::class, $model->getRegion());
    }

    public function testGetCity()
    {
        $model = new AEBRegion();
        $this->assertInstanceOf(CityQuery::class, $model->getCity());
    }

    public function testYearRequired()
    {
        $model = new AEBRegion();
        $this->assertFalse($model->validate(['year']));
        $this->assertEquals(['Year cannot be blank.'], $model->getErrors('year'));
    }
}
