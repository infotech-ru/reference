<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\BrandQuery;
use infotech\reference\models\EquipmentQuery;
use infotech\reference\models\GenerationQuery;
use infotech\reference\models\ModelAlias;
use infotech\reference\models\ModelAliasQuery;
use infotech\reference\models\ModelQuery;
use infotech\reference\models\ModificationQuery;
use infotech\reference\models\SerieQuery;
use infotech\reference\tests\fixtures\ModelAliasFixture;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class ModelAliasTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            ModelAliasFixture::class,
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
        self::assertNotNull(new ModelAlias());
    }

    public function testTableName()
    {
        self::assertEquals('model_alias', ModelAlias::tableName());
    }

    public function testStatusActive()
    {
        self::assertEquals(0, ModelAlias::STATUS_ACTIVE);
    }

    public function testStatusDeleted()
    {
        self::assertEquals(1, ModelAlias::STATUS_DELETED);
    }

    public function testFind()
    {
        self::assertInstanceOf(ModelAliasQuery::class, ModelAlias::find());
    }

    public function testGetBrand()
    {
        $model = new ModelAlias();
        self::assertInstanceOf(BrandQuery::class, $model->getBrand());
    }

    public function testGetModel()
    {
        $model = new ModelAlias();
        self::assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testGetGeneration()
    {
        $model = new ModelAlias();
        self::assertInstanceOf(GenerationQuery::class, $model->getGeneration());
    }

    public function testGetSerie()
    {
        $model = new ModelAlias();
        self::assertInstanceOf(SerieQuery::class, $model->getSerie());
    }

    public function testGetModification()
    {
        $model = new ModelAlias();
        self::assertInstanceOf(ModificationQuery::class, $model->getModification());
    }

    public function testGetEquipment()
    {
        $model = new ModelAlias();
        self::assertInstanceOf(EquipmentQuery::class, $model->getEquipment());
    }

    public function testAttributes()
    {
        $model = new ModelAlias();
        self::assertEquals(
            [
                'id',
                'name',
                'brand_id',
                'model_id',
                'generation_id',
                'serie_id',
                'status',
                'code',
                'created_at',
                'updated_at',
                'classification',
                'is_new',
                'model_code',
                'body_code',
                'modification_id',
                'order',
                'dealerpoint_code',
                'equipment_id',
            ],
            $model->attributes()
        );
    }

    public function testGetList()
    {
        self::assertEquals(['1' => '1'], ModelAlias::getList(1));
    }
}
