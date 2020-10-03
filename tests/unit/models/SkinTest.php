<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ModelQuery;
use infotech\reference\models\SerieQuery;
use infotech\reference\models\Skin;
use infotech\reference\models\SkinQuery;
use infotech\reference\models\SkinSerieQuery;
use infotech\reference\tests\fixtures\SkinFixture;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class SkinTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            SkinFixture::class,
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
        $this->assertNotNull(new Skin());
    }

    public function testTableName()
    {
        $this->assertEquals('eqt_skin', Skin::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(SkinQuery::class, Skin::find());
    }

    public function testAttributes()
    {
        $model = new Skin();
        $this->assertEquals(
            [
                'id',
                'model_id',
                'common_skin_id',
                'code',
                'name',
                'created_at',
                'updated_at',
            ],
            $model->attributes()
        );
    }

    public function testGetModel()
    {
        $model = new Skin();
        $this->assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testGetCommonSkin()
    {
        $model = new Skin();
        $this->assertInstanceOf(SkinQuery::class, $model->getCommonSkin());
    }

    public function testGetList()
    {
        $this->assertEquals(['1' => '1'], Skin::getList(1));
    }

    public function testGetSkinSeries()
    {
        $model = new Skin();
        $this->assertInstanceOf(SkinSerieQuery::class, $model->getSkinSeries());
    }

    public function testGetSeries()
    {
        $model = new Skin();
        $this->assertInstanceOf(SerieQuery::class, $model->getSeries());
    }
}
