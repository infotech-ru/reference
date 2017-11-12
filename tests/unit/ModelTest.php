<?php

namespace infotech\reference\tests\unit;


use infotech\reference\BrandQuery;
use infotech\reference\ColorQuery;
use infotech\reference\EmplacementQuery;
use infotech\reference\EquipmentQuery;
use infotech\reference\GenerationQuery;
use infotech\reference\Model;
use infotech\reference\ModelOptionQuery;
use infotech\reference\ModelOptionTagQuery;
use infotech\reference\ModelQuery;
use infotech\reference\ModelYearQuery;
use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new Model());
    }

    public function testTableName()
    {
        $this->assertEquals('models', Model::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(ModelQuery::class, Model::find());
    }

    public function testGetBrand()
    {
        $model = new Model();
        $this->assertInstanceOf(BrandQuery::class, $model->getBrand());
    }

    public function testGetGenerations()
    {
        $model = new Model();
        $this->assertInstanceOf(GenerationQuery::class, $model->getGenerations());
    }

    public function testGetEquipments()
    {
        $model = new Model();
        $this->assertInstanceOf(EquipmentQuery::class, $model->getEquipments());
    }

    public function testGetModelYears()
    {
        $model = new Model();
        $this->assertInstanceOf(ModelYearQuery::class, $model->getModelYears());
    }

    public function testGetColors()
    {
        $model = new Model();
        $this->assertInstanceOf(ColorQuery::class, $model->getColors());
    }

    public function testGetEmplacements()
    {
        $model = new Model();
        $this->assertInstanceOf(EmplacementQuery::class, $model->getEmplacements());
    }

    public function testGetModelOptionTags()
    {
        $model = new Model();
        $this->assertInstanceOf(ModelOptionTagQuery::class, $model->getModelOptionTags());
    }

    public function testGetModelOptions()
    {
        $model = new Model();
        $this->assertInstanceOf(ModelOptionQuery::class, $model->getModelOptions());
    }
}