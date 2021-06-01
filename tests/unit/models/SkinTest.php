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
        self::assertNotNull(new Skin());
    }

    public function testTableName()
    {
        self::assertEquals('eqt_skin', Skin::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(SkinQuery::class, Skin::find());
    }

    public function testAttributes()
    {
        $model = new Skin();
        self::assertEquals(
            [
                'id',
                'model_id',
                'common_skin_id',
                'code',
                'name',
                'image_url',
                'created_at',
                'updated_at',
            ],
            $model->attributes()
        );
    }

    public function testGetModel()
    {
        $model = new Skin();
        self::assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testGetCommonSkin()
    {
        $model = new Skin();
        self::assertInstanceOf(SkinQuery::class, $model->getCommonSkin());
    }

    public function testGetList()
    {
        self::assertEquals(['1' => '1'], Skin::getList(1));
    }

    public function testGetSkinSeries()
    {
        $model = new Skin();
        self::assertInstanceOf(SkinSerieQuery::class, $model->getSkinSeries());
    }

    public function testGetSeries()
    {
        $model = new Skin();
        self::assertInstanceOf(SerieQuery::class, $model->getSeries());
    }
}
