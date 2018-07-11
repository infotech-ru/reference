<?php

namespace infotech\reference\tests\unit\models;


use app\fixtures\RussianNameFixture;
use infotech\reference\models\RussianName;
use infotech\reference\models\RussianNameQuery;
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
        $this->assertNotNull(new RussianName());
    }

    public function testTableName()
    {
        $this->assertEquals('russian_name', RussianName::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(RussianNameQuery::class, RussianName::find());
    }

    public function testAttributes()
    {
        $model = new RussianName();
        $this->assertEquals(
            [
                'id',
                'name',
                'sex',
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
        $this->assertEquals($sex, RussianName::name2Sex($name), $name);
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