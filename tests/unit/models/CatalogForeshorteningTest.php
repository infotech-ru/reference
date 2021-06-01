<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\CatalogForeshortening;
use infotech\reference\models\CatalogForeshorteningQuery;
use infotech\reference\models\CatalogImageQuery;
use PHPUnit\Framework\TestCase;

class CatalogForeshorteningTest extends TestCase
{
    public function testConstructor()
    {
        self::assertNotNull(new CatalogForeshortening());
    }

    public function testTableName()
    {
        self::assertEquals('eqt_catalog_foreshortening', CatalogForeshortening::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(CatalogForeshorteningQuery::class, CatalogForeshortening::find());
    }

    public function testAttributes()
    {
        $model = new CatalogForeshortening();
        self::assertEquals(
            [
                'id',
                'name',
                'order',
                'created_at',
                'updated_at',
            ],
            $model->attributes()
        );
    }

    public function testGetCatalogImages()
    {
        $model = new CatalogForeshortening();
        self::assertInstanceOf(CatalogImageQuery::class, $model->getCatalogImages());
    }
}
