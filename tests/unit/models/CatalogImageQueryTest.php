<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\ActiveQuery;
use infotech\reference\models\CatalogImage;
use infotech\reference\models\CatalogImageQuery;
use PHPUnit\Framework\TestCase;

class CatalogImageQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new CatalogImageQuery(CatalogImage::class));
    }

    public function testIsMain()
    {
        $query = new CatalogImageQuery(CatalogImage::class);
        $query->isMain();
        $this->assertEquals(['eqt_catalog_image.is_main' => true], $query->where);

        $query = new CatalogImageQuery(CatalogImage::class);
        $query->isMain(1);
        $this->assertEquals(['eqt_catalog_image.is_main' => 1], $query->where);
    }

    public function testIsSerieMain()
    {
        $query = new CatalogImageQuery(CatalogImage::class);
        $query->isSerieMain();
        $this->assertEquals(['eqt_catalog_image.is_serie_main' => true], $query->where);

        $query = new CatalogImageQuery(CatalogImage::class);
        $query->isSerieMain(1);
        $this->assertEquals(['eqt_catalog_image.is_serie_main' => 1], $query->where);
    }
}