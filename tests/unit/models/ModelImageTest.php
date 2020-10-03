<?php

namespace infotech\reference\tests\unit\models;

use app\fixtures\ModelImageFixture;
use infotech\reference\models\ModelImage;
use infotech\reference\models\ModelImageQuery;
use infotech\reference\models\ModelQuery;
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
        $this->assertNotNull(new ModelImage());
    }

    public function testTableName()
    {
        $this->assertEquals('model_image', ModelImage::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(ModelImageQuery::class, ModelImage::find());
    }

    public function testAttributes()
    {
        $model = new ModelImage();
        $this->assertEquals(
            [
                'id',
                'model_id',
                'url',
                'category',
                'priority',
                'status',
                'generation_id',
                'series_id',
            ],
            $model->attributes()
        );
    }

    public function testStatuses()
    {
        $this->assertEquals(0, ModelImage::STATUS_ACTIVE);
        $this->assertEquals(1, ModelImage::STATUS_DELETED);
    }

    public function testGetStatusList()
    {
        $this->assertEquals([0 => 'Активно', 1 => 'Удалено'], ModelImage::getStatusList());
    }

    public function testCategory()
    {
        $this->assertEquals(1, ModelImage::CATEGORY_INTERNAL);
        $this->assertEquals(0, ModelImage::CATEGORY_EXTERNAL);
    }

    public function testGetCategoryList()
    {
        $this->assertEquals([0 => 'Экстернал', 1 => 'Интернал',], ModelImage::getCategoryList());
    }

    public function testGetModel()
    {
        $model = new ModelImage();
        $this->assertInstanceOf(ModelQuery::class, $model->getModel());
    }
}
