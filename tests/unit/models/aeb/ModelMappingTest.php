<?php

namespace infotech\reference\tests\unit\models\aeb;

use infotech\reference\models\aeb\ModelMapping;
use infotech\reference\models\BrandQuery;
use infotech\reference\models\ModelQuery;
use PHPUnit\Framework\TestCase;
use yii\db\ActiveQuery;

class ModelMappingTest extends TestCase
{
    public function testConstructor()
    {
        self::assertNotNull(new ModelMapping());
    }

    public function testTableName()
    {
        self::assertEquals('aeb_model_mapping', ModelMapping::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(ActiveQuery::class, ModelMapping::find());
    }

    public function testAttributes()
    {
        $model = new ModelMapping();
        self::assertEquals(
            [
                'id',
                'brand_id',
                'model_id',
                'name',
                'created_at',
                'aeb_region_upload_history_id',
            ],
            $model->attributes()
        );
    }

    public function testGetBrand()
    {
        $model = new ModelMapping();
        self::assertInstanceOf(BrandQuery::class, $model->getBrand());
    }

    public function testGetModel()
    {
        $model = new ModelMapping();
        self::assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testGetAEBRegionUploadHistory()
    {
        $model = new ModelMapping();
        self::assertInstanceOf(ActiveQuery::class, $model->getAEBRegionUploadHistory());
    }

    public function testAttributeLabels()
    {
        $model = new ModelMapping();
        self::assertEquals(
            [
                'name' => 'Название для сопоставления',
                'model_id' => 'ID модели',
                'brand_id' => 'ID бренда',
            ],
            $model->attributeLabels()
        );
    }
}
