<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\BrandQuery;
use infotech\reference\models\CatalogEmplacementQuery;
use infotech\reference\models\ColorQuery;
use infotech\reference\models\EquipmentQuery;
use infotech\reference\models\GenerationQuery;
use infotech\reference\models\Model;
use infotech\reference\models\ModelClassQuery;
use infotech\reference\models\ModelImageQuery;
use infotech\reference\models\ModelOptionQuery;
use infotech\reference\models\ModelOptionTagQuery;
use infotech\reference\models\ModelQuery;
use infotech\reference\models\ModelSegmentQuery;
use infotech\reference\models\ModelVideoQuery;
use infotech\reference\models\ModelYearQuery;
use infotech\reference\models\SkinQuery;
use infotech\reference\tests\fixtures\ModelFixture;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class ModelTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            ModelFixture::class,
        ];
    }

    public function setUp(): void
    {
        $this->loadFixtures();
    }

    public function tearDown(): void
    {
        $this->unloadFixtures();
    }

    public function testConstructor()
    {
        self::assertNotNull(new Model());
    }

    public function testTableName()
    {
        self::assertEquals('models', Model::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(ModelQuery::class, Model::find());
    }

    public function testGetBrand()
    {
        $model = new Model();
        self::assertInstanceOf(BrandQuery::class, $model->getBrand());
    }

    public function testGetGenerations()
    {
        $model = new Model();
        self::assertInstanceOf(GenerationQuery::class, $model->getGenerations());
    }

    public function testGetEquipments()
    {
        $model = new Model();
        self::assertInstanceOf(EquipmentQuery::class, $model->getEquipments());
    }

    public function testGetModelYears()
    {
        $model = new Model();
        self::assertInstanceOf(ModelYearQuery::class, $model->getModelYears());
    }

    public function testGetColors()
    {
        $model = new Model();
        self::assertInstanceOf(ColorQuery::class, $model->getColors());
    }

    public function testGetCatalogEmplacements()
    {
        $model = new Model();
        self::assertInstanceOf(CatalogEmplacementQuery::class, $model->getCatalogEmplacements());
    }

    public function testGetModelOptionTags()
    {
        $model = new Model();
        self::assertInstanceOf(ModelOptionTagQuery::class, $model->getModelOptionTags());
    }

    public function testGetModelOptions()
    {
        $model = new Model();
        self::assertInstanceOf(ModelOptionQuery::class, $model->getModelOptions());
    }

    public function testGetModelSegment()
    {
        $model = new Model();
        self::assertInstanceOf(ModelSegmentQuery::class, $model->getModelSegment());
    }

    public function testGetModelClass()
    {
        $model = new Model();
        self::assertInstanceOf(ModelClassQuery::class, $model->getModelClass());
    }

    public function testGetModelImages()
    {
        $model = new Model();
        self::assertInstanceOf(ModelImageQuery::class, $model->getModelImages());
    }

    public function testGetModelVideos()
    {
        $model = new Model();
        self::assertInstanceOf(ModelVideoQuery::class, $model->getModelVideos());
    }

    public function testAttributes()
    {
        $model = new Model();
        self::assertEquals(
            [
                'brand_id',
                'id',
                'name',
                'tradein_code',
                'code',
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
        self::assertEquals(['1' => '1'], Model::getList(1, true));
        self::assertEquals(['1' => '1', '2' => '2'], Model::getList(1, false));
    }

    public function testGetSkins()
    {
        $model = new Model();
        self::assertInstanceOf(SkinQuery::class, $model->getSkins());
    }

    public function testGetFullName()
    {
        $model = Model::findOne(1);
        self::assertInstanceOf(Model::class, $model);
        self::assertEquals('Opel 1', $model->getFullName());
    }
}
