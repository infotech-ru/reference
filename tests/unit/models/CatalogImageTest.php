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
        $this->assertNotNull(new CatalogImage());
    }

    public function testTableName()
    {
        $this->assertEquals('eqt_catalog_image', CatalogImage::tableName());
    }

    public function testPrimaryKey()
    {
        $this->assertEquals(['emplacement_id', 'foreshortening_id'], CatalogImage::primaryKey());
    }

    public function testFind()
    {
        $this->assertInstanceOf(CatalogImageQuery::class, CatalogImage::find());
    }

    public function testGetCatalogEmplacement()
    {
        $model = new CatalogImage();
        $this->assertInstanceOf(CatalogEmplacementQuery::class, $model->getCatalogEmplacement());
    }

    public function testGetCatalogForeshortening()
    {
        $model = new CatalogImage();
        $this->assertInstanceOf(CatalogForeshorteningQuery::class, $model->getCatalogForeshortening());
    }

    public function testAttributes()
    {
        $model = new CatalogImage();
        $this->assertEquals(
            [
                'emplacement_id',
                'foreshortening_id',
                'url',
                'is_main',
                'is_serie_main',
                'created_at',
                'updated_at',
                'is_not_convert',
            ],
            $model->attributes()
        );
    }
}
