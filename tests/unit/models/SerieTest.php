<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\BodyQuery;
use infotech\reference\models\CatalogEmplacementQuery;
use infotech\reference\models\EquipmentQuery;
use infotech\reference\models\GenerationQuery;
use infotech\reference\models\ModelQuery;
use infotech\reference\models\ModificationQuery;
use infotech\reference\models\Serie;
use infotech\reference\models\SerieQuery;
use infotech\reference\models\SkinQuery;
use infotech\reference\models\SkinSerieQuery;
use infotech\reference\tests\fixtures\SerieFixture;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class SerieTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            SerieFixture::class,
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
        self::assertNotNull(new Serie());
    }

    public function testTableName()
    {
        self::assertEquals('car_serie', Serie::tableName());
    }

    public function testPrimaryKey()
    {
        self::assertEquals(['id_car_serie'], Serie::primaryKey());
    }

    public function testFind()
    {
        self::assertInstanceOf(SerieQuery::class, Serie::find());
    }

    public function testGetGeneration()
    {
        $model = new Serie();
        self::assertInstanceOf(GenerationQuery::class, $model->getGeneration());
    }

    public function testGetBody()
    {
        $model = new Serie();
        self::assertInstanceOf(BodyQuery::class, $model->getBody());
    }

    public function testGetModifications()
    {
        $model = new Serie();
        self::assertInstanceOf(ModificationQuery::class, $model->getModifications());
    }

    public function testGetEquipments()
    {
        $model = new Serie();
        self::assertInstanceOf(EquipmentQuery::class, $model->getEquipments());
    }

    public function testGetCatalogEmplacements()
    {
        $model = new Serie();
        self::assertInstanceOf(CatalogEmplacementQuery::class, $model->getCatalogEmplacements());
    }

    public function testAttributes()
    {
        $model = new Serie();
        self::assertEquals(
            [
                'id_car_serie',
                'model_id',
                'name',
                'is_visible',
                'id_car_generation',
                'id_car_type',
                'body_id',
                'is_recent',
                'origin_id',
            ],
            $model->attributes()
        );
    }

    public function testGetList()
    {
        self::assertEquals(['1' => '1'], Serie::getList(1, true));
        self::assertEquals(['1' => '1', '2' => '2'], Serie::getList(1, false));
    }

    public function testGetSkinSeries()
    {
        $model = new Serie();
        self::assertInstanceOf(SkinSerieQuery::class, $model->getSkinSeries());
    }

    public function testGetSkins()
    {
        $model = new Serie();
        self::assertInstanceOf(SkinQuery::class, $model->getSkins());
    }

    public function testGetReferenceModel()
    {
        $model = new Serie();
        self::assertInstanceOf(ModelQuery::class, $model->getReferenceModel());
    }
}
