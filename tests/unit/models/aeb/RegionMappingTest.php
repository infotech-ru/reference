<?php

namespace infotech\reference\tests\unit\models\aeb;

use infotech\reference\models\aeb\RegionMapping;
use infotech\reference\models\RegionQuery;
use PHPUnit\Framework\TestCase;
use yii\db\ActiveQuery;

class RegionMappingTest extends TestCase
{
    public function testConstructor()
    {
        self::assertNotNull(new RegionMapping());
    }

    public function testTableName()
    {
        self::assertEquals('aeb_region_mapping', RegionMapping::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(ActiveQuery::class, RegionMapping::find());
    }

    public function testAttributes()
    {
        $model = new RegionMapping();
        self::assertEquals(
            [
                'id',
                'region_id',
                'name',
                'created_at',
                'aeb_region_upload_history_id',
            ],
            $model->attributes()
        );
    }

    public function testGetRegion()
    {
        $model = new RegionMapping();
        self::assertInstanceOf(RegionQuery::class, $model->getRegion());
    }

    public function testGetAEBRegionUploadHistory()
    {
        $model = new RegionMapping();
        self::assertInstanceOf(ActiveQuery::class, $model->getAEBRegionUploadHistory());
    }

    public function testAttributeLabels()
    {
        $model = new RegionMapping();
        self::assertEquals(
            [
                'name' => 'Название',
                'region_id' => 'ID региона',
            ],
            $model->attributeLabels()
        );
    }
}
