<?php

namespace infotech\reference\tests\unit\models\aeb;

use infotech\reference\models\aeb\BrandMapping;
use infotech\reference\models\BrandQuery;
use PHPUnit\Framework\TestCase;
use yii\db\ActiveQuery;

class BrandMappingTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new BrandMapping());
    }

    public function testTableName()
    {
        $this->assertEquals('aeb_brand_mapping', BrandMapping::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(ActiveQuery::class, BrandMapping::find());
    }

    public function testAttributes()
    {
        $model = new BrandMapping();
        $this->assertEquals(
            [
                'id',
                'brand_id',
                'name',
                'created_at',
            ],
            $model->attributes()
        );
    }

    public function testGetBrand()
    {
        $model = new BrandMapping();
        $this->assertInstanceOf(BrandQuery::class, $model->getBrand());
    }

    public function testAttributeLabels()
    {
        $model = new BrandMapping();
        $this->assertEquals(
            ['id' => 'ID', 'brand_id' => 'Brand ID', 'name' => 'Name', 'created_at' => 'Created At',],
            $model->attributeLabels()
        );
    }

    public function testBrandIdRequired()
    {
        $model = new BrandMapping();
        $this->assertFalse($model->validate(['brand_id']));
        $this->assertEquals(['Brand ID cannot be blank.'], $model->getErrors('brand_id'));
    }
}
