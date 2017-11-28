<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\Brand;
use infotech\reference\models\BrandLogoQuery;
use infotech\reference\models\BrandQuery;
use infotech\reference\models\ModelQuery;
use infotech\reference\models\OptionGroupQuery;
use infotech\reference\models\OrderTypeQuery;
use PHPUnit\Framework\TestCase;

class BrandTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new Brand());
    }

    public function testTableName()
    {
        $this->assertEquals('brands', Brand::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(BrandQuery::class, Brand::find());
    }

    public function testGetModels()
    {
        $model = new Brand();
        $this->assertInstanceOf(ModelQuery::class, $model->getModels());
    }

    public function testGetBrandLogo()
    {
        $model = new Brand();
        $this->assertInstanceOf(BrandLogoQuery::class, $model->getBrandLogo());
    }

    public function testGetOptionGroups()
    {
        $model = new Brand();
        $this->assertInstanceOf(OptionGroupQuery::class, $model->getOptionGroups());
    }

    public function testAttributes()
    {
        $model = new Brand();
        $this->assertEquals(
            [
                'id',
                'name',
                'logo',
                'importer_db_name',
                'host',
                'token',
                'ecm_id',
                'is_supported',
                'origin_id',
            ],
            $model->attributes()
        );
    }

    public function testGetList()
    {
        $this->assertEquals([
            '1' => 'Opel',
            '2' => 'Chevrolet',
            '3' => 'Cadillac',
        ], Brand::getList());
    }

    public function testSubaruId()
    {
        $this->assertEquals(111, Brand::SUBARU_ID);
    }

    public function testGazId()
    {
        $this->assertEquals(127, Brand::GAZ_ID);
    }

    public function testUazId()
    {
        $this->assertEquals(134, Brand::UAZ_ID);
    }

    public function testGetOrderTypes()
    {
        $model = new Brand();
        $this->assertInstanceOf(OrderTypeQuery::class, $model->getOrderTypes());
    }
}