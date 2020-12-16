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
        $this->assertNotNull(new Color());
    }

    public function testTableName()
    {
        $this->assertEquals('eqt_color', Color::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(ColorQuery::class, Color::find());
    }

    public function testGetModel()
    {
        $model = new Color();
        $this->assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testGetCommonColor()
    {
        $model = new Color();
        $this->assertInstanceOf(ColorQuery::class, $model->getCommonColor());
    }

    public function testGetCatalogEmplacements()
    {
        $model = new Color();
        $this->assertInstanceOf(CatalogEmplacementQuery::class, $model->getCatalogEmplacements());
    }

    public function testAttributes()
    {
        $model = new Color();
        $this->assertEquals(
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
            ],
            $model->attributes()
        );
    }

    public function testGetList()
    {
        $this->assertEquals(['1' => '1'], Color::getList(1));
        $this->assertEquals(['2' => '2'], Color::getList(2));
    }
}
