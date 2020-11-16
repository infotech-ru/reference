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
        $this->assertNotNull(new CatalogEmplacement());
    }

    public function testTableName()
    {
        $this->assertEquals('eqt_catalog_emplacement', CatalogEmplacement::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(CatalogEmplacementQuery::class, CatalogEmplacement::find());
    }

    public function testGetModel()
    {
        $model = new CatalogEmplacement();
        $this->assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testGetSerie()
    {
        $model = new CatalogEmplacement();
        $this->assertInstanceOf(SerieQuery::class, $model->getSerie());
    }

    public function testGetColor()
    {
        $model = new CatalogEmplacement();
        $this->assertInstanceOf(ColorQuery::class, $model->getColor());
    }

    public function testGetEquipment()
    {
        $model = new CatalogEmplacement();
        $this->assertInstanceOf(EquipmentQuery::class, $model->getEquipment());
    }

    public function testAttributes()
    {
        $model = new CatalogEmplacement();
        $this->assertEquals(
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
        $this->assertInstanceOf(CatalogImageQuery::class, $model->getCatalogImages());
    }
}
