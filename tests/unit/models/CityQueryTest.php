<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\City;
use infotech\reference\models\CityQuery;
use infotech\reference\tests\fixtures\CityFixture;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class CityQueryTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            CityFixture::class,
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
        self::assertInstanceOf(ActiveQuery::class, new CityQuery(City::class));
    }

    public function testRegion()
    {
        $query = new CityQuery(City::class);
        self::assertEquals($query, $query->region(1));
        self::assertEquals(['cities.region_id' => 1], $query->where);

        $query = new CityQuery(City::class);
        self::assertEquals($query, $query->region([1, 2]));
        self::assertEquals(['cities.region_id' => [1, 2]], $query->where);
    }

    public function testName()
    {
        $query = new CityQuery(City::class);
        $query->name('Петербург');

        self::assertEquals(['like', 'name', 'Петербург'], $query->where);
        self::assertEquals(1, count($query->all()));
    }
}
