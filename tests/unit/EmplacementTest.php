<?php

namespace infotech\reference\tests\unit;


use infotech\reference\ColorQuery;
use infotech\reference\Emplacement;
use infotech\reference\EmplacementQuery;
use infotech\reference\EquipmentQuery;
use infotech\reference\ModelQuery;
use infotech\reference\SerieQuery;
use PHPUnit\Framework\TestCase;

class EmplacementTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new Emplacement());
    }

    public function testTableName()
    {
        $this->assertEquals('eqt_catalog_emplacement', Emplacement::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(EmplacementQuery::class, Emplacement::find());
    }

    public function testGetModel()
    {
        $model = new Emplacement();
        $this->assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testGetSerie()
    {
        $model = new Emplacement();
        $this->assertInstanceOf(SerieQuery::class, $model->getSerie());
    }

    public function testGetColor()
    {
        $model = new Emplacement();
        $this->assertInstanceOf(ColorQuery::class, $model->getColor());
    }

    public function testGetEquipment()
    {
        $model = new Emplacement();
        $this->assertInstanceOf(EquipmentQuery::class, $model->getEquipment());
    }

    public function testAttributes()
    {
        $model = new Emplacement();
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
}