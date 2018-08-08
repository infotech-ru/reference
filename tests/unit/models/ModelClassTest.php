<?php

namespace infotech\reference\tests\unit\models;


use app\fixtures\ModelClassFixture;
use infotech\reference\models\ModelClass;
use infotech\reference\models\ModelClassQuery;
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
        $this->assertNotNull(new ModelClass());
    }

    public function testTableName()
    {
        $this->assertEquals('model_class', ModelClass::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(ModelClassQuery::class, ModelClass::find());
    }

    public function testAttributes()
    {
        $model = new ModelClass();
        $this->assertEquals(
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
        $this->assertEquals(['1' => '1', '2' => '2'], ModelClass::getList());
    }

    public function testStatuses()
    {
        $this->assertEquals(0, ModelClass::STATUS_ACTIVE);
        $this->assertEquals(1, ModelClass::STATUS_DELETED);
    }

    public function testGetStatusList()
    {
        $this->assertEquals([0 => 'Активно', 1 => 'Удалено'], ModelClass::getStatusList());
    }
}