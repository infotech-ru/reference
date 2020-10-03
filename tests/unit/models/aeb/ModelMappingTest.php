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
        $this->assertNotNull(new ModelMapping());
    }

    public function testTableName()
    {
        $this->assertEquals('aeb_model_mapping', ModelMapping::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(ActiveQuery::class, ModelMapping::find());
    }

    public function testAttributes()
    {
        $model = new ModelMapping();
        $this->assertEquals(
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
        $this->assertInstanceOf(BrandQuery::class, $model->getBrand());
    }

    public function testGetModel()
    {
        $model = new ModelMapping();
        $this->assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testGetAEBRegionUploadHistory()
    {
        $model = new ModelMapping();
        $this->assertInstanceOf(ActiveQuery::class, $model->getAEBRegionUploadHistory());
    }

    public function testAttributeLabels()
    {
        $model = new ModelMapping();
        $this->assertEquals([
            'name' => 'Название для сопоставления',
            'model_id' => 'ID модели',
            'brand_id' => 'ID бренда',
        ], $model->attributeLabels());
    }
}
