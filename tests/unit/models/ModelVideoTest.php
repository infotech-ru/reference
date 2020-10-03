<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ModelQuery;
use infotech\reference\models\ModelVideo;
use infotech\reference\models\ModelVideoQuery;
use infotech\reference\tests\fixtures\ModelVideoFixture;
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

    public function testStatuses()
    {
        $this->assertEquals(0, ModelVideo::STATUS_ACTIVE);
        $this->assertEquals(1, ModelVideo::STATUS_DELETED);
    }

    public function testGetStatusList()
    {
        $this->assertEquals([0 => 'Активно', 1 => 'Удалено'], ModelVideo::getStatusList());
    }

    public function testType()
    {
        $this->assertEquals(1, ModelVideo::TYPE_YOUTUBE);
        $this->assertEquals(0, ModelVideo::TYPE_URL);
    }

    public function testGetTypeList()
    {
        $this->assertEquals([0 => 'Видео', 1 => 'YouTube',], ModelVideo::getTypeList());
    }

    public function testGetModel()
    {
        $model = new ModelVideo();
        $this->assertInstanceOf(ModelQuery::class, $model->getModel());
    }
}
