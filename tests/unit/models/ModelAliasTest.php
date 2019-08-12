<?php

namespace infotech\reference\tests\unit\models;


use app\fixtures\ModelAliasFixture;
use infotech\reference\models\BrandQuery;
use infotech\reference\models\GenerationQuery;
use infotech\reference\models\ModelAlias;
use infotech\reference\models\ModelAliasQuery;
use infotech\reference\models\ModelQuery;
use infotech\reference\models\SerieQuery;
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

    public function setUp()
    {
        $this->loadFixtures();
    }

    public function tearDown()
    {
        $this->unloadFixtures();
    }


    public function testConstructor()
    {
        $this->assertNotNull(new ModelAlias());
    }

    public function testTableName()
    {
        $this->assertEquals('model_alias', ModelAlias::tableName());
    }

    public function testStatusActive()
    {
        $this->assertEquals(0, ModelAlias::STATUS_ACTIVE);
    }

    public function testStatusDeleted()
    {
        $this->assertEquals(1, ModelAlias::STATUS_DELETED);
    }

    public function testFind()
    {
        $this->assertInstanceOf(ModelAliasQuery::class, ModelAlias::find());
    }

    public function testGetBrand()
    {
        $model = new ModelAlias();
        $this->assertInstanceOf(BrandQuery::class, $model->getBrand());
    }

    public function testGetModel()
    {
        $model = new ModelAlias();
        $this->assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testGetGeneration()
    {
        $model = new ModelAlias();
        $this->assertInstanceOf(GenerationQuery::class, $model->getGeneration());
    }

    public function testGetSerie()
    {
        $model = new ModelAlias();
        $this->assertInstanceOf(SerieQuery::class, $model->getSerie());
    }

    public function testAttributes()
    {
        $model = new ModelAlias();
        $this->assertEquals(
            [
                'id',
                'name',
                'brand_id',
                'model_id',
                'generation_id',
                'serie_id',
                'status',
                'created_at',
                'updated_at',
                'classification',
                'is_new',
                'model_code',
                'body_code',
            ],
            $model->attributes()
        );
    }

    public function testGetList()
    {
        $this->assertEquals(['1' => '1'], ModelAlias::getList(1));
    }
}