<?php

namespace infotech\reference\tests\unit\models;


use app\fixtures\ModelVideoFixture;
use infotech\reference\models\ModelVideo;
use infotech\reference\models\ModelVideoQuery;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class ModelVideoTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            ModelVideoFixture::class,
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
        $this->assertNotNull(new ModelVideo());
    }

    public function testTableName()
    {
        $this->assertEquals('model_video', ModelVideo::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(ModelVideoQuery::class, ModelVideo::find());
    }

    public function testAttributes()
    {
        $model = new ModelVideo();
        $this->assertEquals(
            [
                'id',
                'model_id',
                'type',
                'url',
                'priority',
                'status',
            ],
            $model->attributes()
        );
    }
}