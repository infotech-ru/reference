<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\CatalogEmplacementQuery;
use infotech\reference\models\Color;
use infotech\reference\models\ColorQuery;
use infotech\reference\models\ModelQuery;
use infotech\reference\tests\fixtures\ColorFixture;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class ColorTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            ColorFixture::class,
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
        self::assertNotNull(new Color());
    }

    public function testTableName()
    {
        self::assertEquals('eqt_color', Color::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(ColorQuery::class, Color::find());
    }

    public function testGetModel()
    {
        $model = new Color();
        self::assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testGetCommonColor()
    {
        $model = new Color();
        self::assertInstanceOf(ColorQuery::class, $model->getCommonColor());
    }

    public function testGetCatalogEmplacements()
    {
        $model = new Color();
        self::assertInstanceOf(CatalogEmplacementQuery::class, $model->getCatalogEmplacements());
    }

    public function testAttributes()
    {
        $model = new Color();
        self::assertEquals(
            [
                'id',
                'code',
                'model_id',
                'common_color_id',
                'rgb',
                'name',
                'image_url',
                'created_at',
                'updated_at',
                'is_deleted'
            ],
            $model->attributes()
        );
    }

    public function testGetList()
    {
        self::assertEquals(['1' => '1 ()'], Color::getList(1));
        self::assertEquals(['2' => '2 ()'], Color::getList(2));
    }
}
