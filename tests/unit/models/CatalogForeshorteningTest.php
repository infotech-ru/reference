<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\CatalogForeshortening;
use infotech\reference\models\CatalogForeshorteningQuery;
use PHPUnit\Framework\TestCase;

class CatalogForeshorteningTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new CatalogForeshortening());
    }

    public function testTableName()
    {
        $this->assertEquals('eqt_catalog_foreshortening', CatalogForeshortening::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(CatalogForeshorteningQuery::class, CatalogForeshortening::find());
    }

    public function testAttributes()
    {
        $model = new CatalogForeshortening();
        $this->assertEquals(
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
}