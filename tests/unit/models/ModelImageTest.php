<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\GenerationQuery;
use infotech\reference\models\ModelImage;
use infotech\reference\models\ModelImageQuery;
use infotech\reference\models\ModelQuery;
use infotech\reference\models\SerieQuery;
use infotech\reference\tests\fixtures\ModelImageFixture;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class ModelImageTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            ModelImageFixture::class,
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
        self::assertNotNull(new ModelImage());
    }

    public function testTableName()
    {
        self::assertEquals('model_image', ModelImage::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(ModelImageQuery::class, ModelImage::find());
    }

    public function testAttributes()
    {
        $model = new ModelImage();
        self::assertEquals(
            [
                'id',
                'model_id',
                'url',
                'category',
                'priority',
                'status',
                'generation_id',
                'series_id',
                'equipment_id',
                'skin_id',
                'placement_type',
            ],
            $model->attributes()
        );
    }

    public function testStatuses()
    {
        self::assertEquals(0, ModelImage::STATUS_ACTIVE);
        self::assertEquals(1, ModelImage::STATUS_DELETED);
    }

    public function testGetStatusList()
    {
        self::assertEquals([0 => 'Активно', 1 => 'Удалено'], ModelImage::getStatusList());
    }

    public function testCategory()
    {
        self::assertEquals(1, ModelImage::CATEGORY_INTERNAL);
        self::assertEquals(0, ModelImage::CATEGORY_EXTERNAL);
    }

    public function testGetCategoryList()
    {
        self::assertEquals([0 => 'Экстернал', 1 => 'Интернал',], ModelImage::getCategoryList());
    }

    public function testGetModel()
    {
        $model = new ModelImage();
        self::assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testGetGeneration()
    {
        $model = new ModelImage();
        self::assertInstanceOf(GenerationQuery::class, $model->getGeneration());
    }

    public function testGetSeries()
    {
        $model = new ModelImage();
        self::assertInstanceOf(SerieQuery::class, $model->getSeries());
    }
}
