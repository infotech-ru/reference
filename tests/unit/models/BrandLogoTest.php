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
        self::assertNotNull(new BrandLogo());
    }

    public function testTableName()
    {
        self::assertEquals('eqt_brand_logo', BrandLogo::tableName());
    }

    public function testPrimaryKey()
    {
        self::assertEquals(['brand_id'], BrandLogo::primaryKey());
    }

    public function testFind()
    {
        self::assertInstanceOf(BrandLogoQuery::class, BrandLogo::find());
    }

    public function testGetBrand()
    {
        $model = new BrandLogo();
        self::assertInstanceOf(BrandQuery::class, $model->getBrand());
    }

    public function testAttributes()
    {
        $model = new BrandLogo();
        self::assertEquals(
            [
                'brand_id',
                'url',
            ],
            $model->attributes()
        );
    }
}
