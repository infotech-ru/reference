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
        self::assertNotNull(new BrandMapping());
    }

    public function testTableName()
    {
        self::assertEquals('aeb_brand_mapping', BrandMapping::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(ActiveQuery::class, BrandMapping::find());
    }

    public function testAttributes()
    {
        $model = new BrandMapping();
        self::assertEquals(
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
        self::assertInstanceOf(BrandQuery::class, $model->getBrand());
    }

    public function testAttributeLabels()
    {
        $model = new BrandMapping();
        self::assertEquals(
            ['id' => 'ID', 'brand_id' => 'Brand ID', 'name' => 'Name', 'created_at' => 'Created At',],
            $model->attributeLabels()
        );
    }

    public function testBrandIdRequired()
    {
        $model = new BrandMapping();
        self::assertFalse($model->validate(['brand_id']));
        self::assertEquals(['Brand ID cannot be blank.'], $model->getErrors('brand_id'));
    }
}
