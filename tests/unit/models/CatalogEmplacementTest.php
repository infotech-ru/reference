<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\CatalogEmplacement;
use infotech\reference\models\CatalogEmplacementQuery;
use infotech\reference\models\CatalogImageQuery;
use infotech\reference\models\ColorQuery;
use infotech\reference\models\EquipmentQuery;
use infotech\reference\models\ModelQuery;
use infotech\reference\models\SerieQuery;
use PHPUnit\Framework\TestCase;

class CatalogEmplacementTest extends TestCase
{
    public function testConstructor()
    {
        self::assertNotNull(new CatalogEmplacement());
    }

    public function testTableName()
    {
        self::assertEquals('eqt_catalog_emplacement', CatalogEmplacement::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(CatalogEmplacementQuery::class, CatalogEmplacement::find());
    }

    public function testGetModel()
    {
        $model = new CatalogEmplacement();
        self::assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testGetSerie()
    {
        $model = new CatalogEmplacement();
        self::assertInstanceOf(SerieQuery::class, $model->getSerie());
    }

    public function testGetColor()
    {
        $model = new CatalogEmplacement();
        self::assertInstanceOf(ColorQuery::class, $model->getColor());
    }

    public function testGetEquipment()
    {
        $model = new CatalogEmplacement();
        self::assertInstanceOf(EquipmentQuery::class, $model->getEquipment());
    }

    public function testAttributes()
    {
        $model = new CatalogEmplacement();
        self::assertEquals(
            [
                'id',
                'model_id',
                'serie_id',
                'color_id',
                'equipment_id',
                'is_main',
                'created_at',
                'updated_at',
            ],
            $model->attributes()
        );
    }

    public function testGetCatalogImages()
    {
        $model = new CatalogEmplacement();
        self::assertInstanceOf(CatalogImageQuery::class, $model->getCatalogImages());
    }
}
