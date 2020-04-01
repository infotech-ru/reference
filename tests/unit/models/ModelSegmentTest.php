<?php

namespace infotech\reference\tests\unit\models;


use app\fixtures\ModelSegmentFixture;
use infotech\reference\models\ModelSegment;
use infotech\reference\models\ModelSegmentQuery;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class ModelSegmentTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            ModelSegmentFixture::class,
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
        $this->assertNotNull(new ModelSegment());
    }

    public function testTableName()
    {
        $this->assertEquals('model_segment', ModelSegment::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(ModelSegmentQuery::class, ModelSegment::find());
    }

    public function testAttributes()
    {
        $model = new ModelSegment();
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
        $this->assertEquals(['1' => '1', '2' => '2'], ModelSegment::getList());
    }

    public function testStatuses()
    {
        $this->assertEquals(0, ModelSegment::STATUS_ACTIVE);
        $this->assertEquals(1, ModelSegment::STATUS_DELETED);
    }

    public function testGetStatusList()
    {
        $this->assertEquals([0 => 'Активно', 1 => 'Удалено'], ModelSegment::getStatusList());
    }
}