<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\BrandLogo;
use infotech\reference\models\BrandLogoQuery;
use infotech\reference\models\BrandQuery;
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
        $this->assertEquals(['brand_id'], BrandLogo::primaryKey());
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

    public function testAttributes()
    {
        $model = new BrandLogo();
        $this->assertEquals(
            [
                'brand_id',
                'url',
            ],
            $model->attributes()
        );
    }
}
