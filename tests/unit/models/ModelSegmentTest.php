<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ModelSegment;
use infotech\reference\models\ModelSegmentQuery;
use infotech\reference\tests\fixtures\ModelSegmentFixture;
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
        self::assertNotNull(new ModelSegment());
    }

    public function testTableName()
    {
        self::assertEquals('model_segment', ModelSegment::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(ModelSegmentQuery::class, ModelSegment::find());
    }

    public function testAttributes()
    {
        $model = new ModelSegment();
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
        self::assertEquals(['1' => '1', '2' => '2'], ModelSegment::getList());
    }

    public function testStatuses()
    {
        self::assertEquals(0, ModelSegment::STATUS_ACTIVE);
        self::assertEquals(1, ModelSegment::STATUS_DELETED);
    }

    public function testGetStatusList()
    {
        self::assertEquals([0 => 'Активно', 1 => 'Удалено'], ModelSegment::getStatusList());
    }
}
