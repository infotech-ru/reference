<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\RussianName;
use infotech\reference\models\RussianNameQuery;
use infotech\reference\tests\fixtures\RussianNameFixture;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class RussianNameTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            RussianNameFixture::class,
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
        self::assertNotNull(new RussianName());
    }

    public function testTableName()
    {
        self::assertEquals('russian_name', RussianName::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(RussianNameQuery::class, RussianName::find());
    }

    public function testAttributes()
    {
        $model = new RussianName();
        self::assertEquals(
            [
                'id',
                'name',
                'alias',
                'sex',
                'status',
                'created_by',
                'updated_by',
                'created_at',
                'updated_at',
            ],
            $model->attributes()
        );
    }

    /**
     * @param $name
     * @param $sex
     * @dataProvider name2SexProvider
     */
    public function testName2Sex($name, $sex)
    {
        self::assertEquals($sex, RussianName::name2Sex($name), $name);
    }

    public function name2SexProvider()
    {
        return [
            ['Алена', RussianName::FEMALE],
            ['АлЁна', RussianName::FEMALE],
            ['Алёна', RussianName::FEMALE],
            ['алёна', RussianName::FEMALE],
            ['алена', RussianName::FEMALE],
            ['Женя', null],
            ['Александр', RussianName::MALE],
            ['александр', RussianName::MALE],
            ['александра', RussianName::FEMALE],
            ['александрА', RussianName::FEMALE],
        ];
    }
}
