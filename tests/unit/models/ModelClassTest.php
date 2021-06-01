<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ModelClass;
use infotech\reference\models\ModelClassQuery;
use infotech\reference\tests\fixtures\ModelClassFixture;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class ModelClassTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            ModelClassFixture::class,
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
        self::assertNotNull(new ModelClass());
    }

    public function testTableName()
    {
        self::assertEquals('model_class', ModelClass::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(ModelClassQuery::class, ModelClass::find());
    }

    public function testAttributes()
    {
        $model = new ModelClass();
        self::assertEquals(
            [
                'id',
                'name',
                'status',
            ],
            $model->attributes()
        );
    }

    public function testGetList()
    {
        self::assertEquals(['1' => '1', '2' => '2'], ModelClass::getList());
    }

    public function testStatuses()
    {
        self::assertEquals(0, ModelClass::STATUS_ACTIVE);
        self::assertEquals(1, ModelClass::STATUS_DELETED);
    }

    public function testGetStatusList()
    {
        self::assertEquals([0 => 'Активно', 1 => 'Удалено'], ModelClass::getStatusList());
    }
}
