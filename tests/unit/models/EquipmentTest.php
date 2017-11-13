<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\CatalogEmplacementQuery;
use infotech\reference\models\Equipment;
use infotech\reference\models\EquipmentQuery;
use infotech\reference\models\ModelQuery;
use infotech\reference\models\SerieQuery;
use PHPUnit\Framework\TestCase;

class EquipmentTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new Equipment());
    }

    public function testTableName()
    {
        $this->assertEquals('eqt_equipment', Equipment::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(EquipmentQuery::class, Equipment::find());
    }

    public function testGetModel()
    {
        $model = new Equipment();
        $this->assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testGetSerie()
    {
        $model = new Equipment();
        $this->assertInstanceOf(SerieQuery::class, $model->getSerie());
    }

    public function testGetCatalogEmplacements()
    {
        $model = new Equipment();
        $this->assertInstanceOf(CatalogEmplacementQuery::class, $model->getCatalogEmplacements());
    }

    public function testAttributes()
    {
        $model = new Equipment();
        $this->assertEquals(
            [
                'id',
                'model_id',
                'series_id',
                'name',
                'archive_name',
                'tech_name',
                'order',
                'status',
                'created_at',
                'updated_at',
                'origin_id',
            ],
            $model->attributes()
        );
    }
}