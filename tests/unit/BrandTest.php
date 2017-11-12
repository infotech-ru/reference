<?php

namespace infotech\reference\tests\unit;


use infotech\reference\Brand;
use infotech\reference\BrandLogoQuery;
use infotech\reference\BrandQuery;
use infotech\reference\ModelQuery;
use infotech\reference\OptionGroupQuery;
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
}