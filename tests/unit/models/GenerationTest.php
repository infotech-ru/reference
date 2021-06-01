<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\Generation;
use infotech\reference\models\GenerationQuery;
use infotech\reference\models\ModelQuery;
use infotech\reference\models\SerieQuery;
use infotech\reference\tests\fixtures\GenerationFixture;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class GenerationTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            GenerationFixture::class,
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
        self::assertNotNull(new Generation());
    }

    public function testTableName()
    {
        self::assertEquals('car_generation', Generation::tableName());
    }

    public function testPrimaryKey()
    {
        self::assertEquals(['id_car_generation'], Generation::primaryKey());
    }

    public function testFind()
    {
        self::assertInstanceOf(GenerationQuery::class, Generation::find());
    }

    public function testGetModel()
    {
        $model = new Generation();
        self::assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testGetSeries()
    {
        $model = new Generation();
        self::assertInstanceOf(SerieQuery::class, $model->getSeries());
    }

    public function testAttributes()
    {
        $model = new Generation();
        self::assertEquals(
            [
                'id_car_generation',
                'name',
                'model_id',
                'year_begin',
                'year_end',
                'is_visible',
                'id_car_type',
                'is_recent',
                'origin_id',
            ],
            $model->attributes()
        );
    }

    public function testGetList()
    {
        self::assertEquals(['1' => '1', '5' => '5'], Generation::getList(1, true, null));
        self::assertEquals(['1' => '1', '2' => '2', '5' => '5'], Generation::getList(1, false, null));
    }
}
