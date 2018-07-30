<?php

namespace infotech\reference\tests\unit\models;


use app\fixtures\ModelImageFixture;
use infotech\reference\models\ModelImage;
use infotech\reference\models\ModelImageQuery;
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
            ],
            $model->attributes()
        );
    }
}