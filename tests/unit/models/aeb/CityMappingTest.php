<?php

namespace infotech\reference\tests\unit\models\aeb;

use infotech\reference\models\aeb\CityMapping;
use infotech\reference\models\CityQuery;
use infotech\reference\models\RegionQuery;
use PHPUnit\Framework\TestCase;
use yii\db\ActiveQuery;

class CityMappingTest extends TestCase
{
    public function testConstructor()
    {
        self::assertNotNull(new CityMapping());
    }

    public function testTableName()
    {
        self::assertEquals('aeb_city_mapping', CityMapping::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(ActiveQuery::class, CityMapping::find());
    }

    public function testAttributes()
    {
        $model = new CityMapping();
        self::assertEquals(
            [
                'id',
                'city_id',
                'region_id',
                'name',
                'created_at',
                'aeb_region_upload_history_id',
            ],
            $model->attributes()
        );
    }

    public function testGetCity()
    {
        $model = new CityMapping();
        self::assertInstanceOf(CityQuery::class, $model->getCity());
    }

    public function testGetRegion()
    {
        $model = new CityMapping();
        self::assertInstanceOf(RegionQuery::class, $model->getRegion());
    }

    public function testAttributeLabels()
    {
        $model = new CityMapping();
        self::assertEquals(
            [
                'name' => 'Название',
                'region_id' => 'ID региона',
                'city_id' => 'ID города',
            ],
            $model->attributeLabels()
        );
    }

    public function testGetAEBRegionUploadHistory()
    {
        $model = new CityMapping();
        self::assertInstanceOf(ActiveQuery::class, $model->getAEBRegionUploadHistory());
    }
}
