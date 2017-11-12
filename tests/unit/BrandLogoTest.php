<?php

namespace infotech\reference\tests\unit;


use infotech\reference\BrandLogo;
use infotech\reference\BrandLogoQuery;
use infotech\reference\BrandQuery;
use PHPUnit\Framework\TestCase;

class BrandLogoTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new BrandLogo());
    }

    public function testTableName()
    {
        $this->assertEquals('eqt_brand_logo', BrandLogo::tableName());
    }

    public function testPrimaryKey()
    {
        $this->assertEquals('brand_id', BrandLogo::primaryKey());
    }

    public function testFind()
    {
        $this->assertInstanceOf(BrandLogoQuery::class, BrandLogo::find());
    }

    public function testGetBrand()
    {
        $model = new BrandLogo();
        $this->assertInstanceOf(BrandQuery::class, $model->getBrand());
    }
}