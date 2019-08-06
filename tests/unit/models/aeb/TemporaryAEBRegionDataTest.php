<?php

namespace infotech\reference\tests\unit\models\aeb;

use infotech\reference\models\aeb\TemporaryAEBRegionData;
use infotech\reference\models\BrandQuery;
use infotech\reference\models\CityQuery;
use infotech\reference\models\ModelQuery;
use infotech\reference\models\RegionQuery;
use PHPUnit\Framework\TestCase;
use yii\db\ActiveQuery;

class TemporaryAEBRegionDataTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new TemporaryAEBRegionData());
    }

    public function testTableName()
    {
        $this->assertEquals('aeb_temporary_aeb_region_data', TemporaryAEBRegionData::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(ActiveQuery::class, TemporaryAEBRegionData::find());
    }

    public function testAttributes()
    {
        $model = new TemporaryAEBRegionData();
        $this->assertEquals(
            [
                'id',
                'brand',
                'brand_id',
                'model',
                'model_id',
                'segment',
                'federal_district',
                'region',
                'region_id',
                'city',
                'city_id',
                'year',
                'data_1',
                'data_2',
                'data_3',
                'data_4',
                'data_5',
                'data_6',
                'data_7',
                'data_8',
                'data_9',
                'data_10',
                'data_11',
                'data_12',
                'created_at',
            ],
            $model->attributes()
        );
    }

    public function testGetBrand()
    {
        $model = new TemporaryAEBRegionData();
        $this->assertInstanceOf(BrandQuery::class, $model->getBrand());
    }

    public function testGetModel()
    {
        $model = new TemporaryAEBRegionData();
        $this->assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testGetCity()
    {
        $model = new TemporaryAEBRegionData();
        $this->assertInstanceOf(CityQuery::class, $model->getCity());
    }

    public function testGetRegion()
    {
        $model = new TemporaryAEBRegionData();
        $this->assertInstanceOf(RegionQuery::class, $model->getRegion());
    }
}