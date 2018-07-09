<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\BrandQuery;
use infotech\reference\models\CatalogEmplacementQuery;
use infotech\reference\models\ColorQuery;
use infotech\reference\models\EquipmentQuery;
use infotech\reference\models\GenerationQuery;
use infotech\reference\models\Model;
use infotech\reference\models\ModelClassQuery;
use infotech\reference\models\ModelOptionQuery;
use infotech\reference\models\ModelOptionTagQuery;
use infotech\reference\models\ModelQuery;
use infotech\reference\models\ModelSegmentQuery;
use infotech\reference\models\ModelYearQuery;
use infotech\reference\models\SkinQuery;
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

    public function testGetCatalogEmplacements()
    {
        $model = new Model();
        $this->assertInstanceOf(CatalogEmplacementQuery::class, $model->getCatalogEmplacements());
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

    public function testGetModelSegment()
    {
        $model = new Model();
        $this->assertInstanceOf(ModelSegmentQuery::class, $model->getModelSegment());
    }


    public function testGetModelClass()
    {
        $model = new Model();
        $this->assertInstanceOf(ModelClassQuery::class, $model->getModelClass());
    }

    public function testAttributes()
    {
        $model = new Model();
        $this->assertEquals(
            [
                'brand_id',
                'id',
                'name',
                'tradein_code',
                'is_recent',
                'dealerpoint_code',
                'ord',
                'ecm_id',
                'is_deleted',
                'is_commercial',
                'origin_id',
                'model_class_id',
                'model_segment_id',
            ],
            $model->attributes()
        );
    }

    public function testGetList()
    {
        $this->assertEquals(['1' => '1'], Model::getList(1, true));
        $this->assertEquals(['1' => '1', '2' => '2'], Model::getList(1, false));
    }

    public function testGetSkins()
    {
        $model = new Model();
        $this->assertInstanceOf(SkinQuery::class, $model->getSkins());
    }

    public function testGetFullName()
    {
        $model = Model::findOne(1);
        $this->assertInstanceOf(Model::class, $model);
        $this->assertEquals('Opel 1', $model->getFullName());
    }
}