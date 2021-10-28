<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\CatalogEmplacementQuery;
use infotech\reference\models\CatalogForeshorteningQuery;
use infotech\reference\models\CatalogImage;
use infotech\reference\models\CatalogImageQuery;
use PHPUnit\Framework\TestCase;

class CatalogImageTest extends TestCase
{
    public function testConstructor()
    {
        self::assertNotNull(new CatalogImage());
    }

    public function testTableName()
    {
        self::assertEquals('eqt_catalog_image', CatalogImage::tableName());
    }

    public function testPrimaryKey()
    {
        self::assertEquals(['emplacement_id', 'foreshortening_id'], CatalogImage::primaryKey());
    }

    public function testFind()
    {
        self::assertInstanceOf(CatalogImageQuery::class, CatalogImage::find());
    }

    public function testGetCatalogEmplacement()
    {
        $model = new CatalogImage();
        self::assertInstanceOf(CatalogEmplacementQuery::class, $model->getCatalogEmplacement());
    }

    public function testGetCatalogForeshortening()
    {
        $model = new CatalogImage();
        self::assertInstanceOf(CatalogForeshorteningQuery::class, $model->getCatalogForeshortening());
    }

    public function testAttributes()
    {
        $model = new CatalogImage();
        self::assertEquals(
            [
                'emplacement_id',
                'foreshortening_id',
                'url',
                'is_main',
                'is_serie_main',
                'created_at',
                'updated_at',
                'is_not_convert',
                'original_image_url',
                'original_image_width',
                'original_image_height',
            ],
            $model->attributes()
        );
    }
}
