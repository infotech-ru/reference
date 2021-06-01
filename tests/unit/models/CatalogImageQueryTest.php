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
        self::assertInstanceOf(ActiveQuery::class, new CatalogImageQuery(CatalogImage::class));
    }

    public function testIsMain()
    {
        $query = new CatalogImageQuery(CatalogImage::class);
        self::assertEquals($query, $query->isMain());
        self::assertEquals(['eqt_catalog_image.is_main' => true], $query->where);

        $query = new CatalogImageQuery(CatalogImage::class);
        self::assertEquals($query, $query->isMain(1));
        self::assertEquals(['eqt_catalog_image.is_main' => 1], $query->where);
    }

    public function testIsSerieMain()
    {
        $query = new CatalogImageQuery(CatalogImage::class);
        self::assertEquals($query, $query->isSerieMain());
        self::assertEquals(['eqt_catalog_image.is_serie_main' => true], $query->where);

        $query = new CatalogImageQuery(CatalogImage::class);
        self::assertEquals($query, $query->isSerieMain(1));
        self::assertEquals(['eqt_catalog_image.is_serie_main' => 1], $query->where);
    }
}
