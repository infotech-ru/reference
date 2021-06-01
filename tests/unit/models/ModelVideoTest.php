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
        self::assertNotNull(new ModelVideo());
    }

    public function testTableName()
    {
        self::assertEquals('model_video', ModelVideo::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(ModelVideoQuery::class, ModelVideo::find());
    }

    public function testAttributes()
    {
        $model = new ModelVideo();
        self::assertEquals(
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
        self::assertEquals(0, ModelVideo::STATUS_ACTIVE);
        self::assertEquals(1, ModelVideo::STATUS_DELETED);
    }

    public function testGetStatusList()
    {
        self::assertEquals([0 => 'Активно', 1 => 'Удалено'], ModelVideo::getStatusList());
    }

    public function testType()
    {
        self::assertEquals(1, ModelVideo::TYPE_YOUTUBE);
        self::assertEquals(0, ModelVideo::TYPE_URL);
    }

    public function testGetTypeList()
    {
        self::assertEquals([0 => 'Видео', 1 => 'YouTube',], ModelVideo::getTypeList());
    }

    public function testGetModel()
    {
        $model = new ModelVideo();
        self::assertInstanceOf(ModelQuery::class, $model->getModel());
    }
}
