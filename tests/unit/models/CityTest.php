<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\City;
use infotech\reference\models\CityQuery;
use infotech\reference\models\CountryQuery;
use infotech\reference\models\RegionQuery;
use infotech\reference\tests\fixtures\CityFixture;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class CityTest extends TestCase
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
        self::assertNotNull(new City());
    }

    public function testTableName()
    {
        self::assertEquals('cities', City::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(CityQuery::class, City::find());
    }

    public function testAttributes()
    {
        $model = new City();
        self::assertEquals(
            [
                'id',
                'country_id',
                'region_id',
                'name',
                'english_name',
                'name_where',
                'timezone',
                'lat',
                'lng',
                'is_regional_center',
                'fias_id',
            ],
            $model->attributes()
        );
    }

    public function testGetCountry()
    {
        $model = new City();
        self::assertInstanceOf(CountryQuery::class, $model->getCountry());
    }

    public function testGetRegion()
    {
        $model = new City();
        self::assertInstanceOf(RegionQuery::class, $model->getRegion());
    }

    public function testGetList()
    {
        self::assertEquals(['1' => '1', '3' => 'г. Санкт-Петербург'], City::getList(1));
    }
}
