<?php

namespace infotech\reference\tests\unit\models;


use app\fixtures\CityFixture;
use infotech\reference\models\City;
use infotech\reference\models\CityQuery;
use infotech\reference\models\CountryQuery;
use infotech\reference\models\RegionQuery;
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
        $this->assertNotNull(new City());
    }

    public function testTableName()
    {
        $this->assertEquals('cities', City::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(CityQuery::class, City::find());
    }

    public function testAttributes()
    {
        $model = new City();
        $this->assertEquals(
            [
                'id',
                'country_id',
                'region_id',
                'name',
                'timezone',
                'lat',
                'lng',
            ],
            $model->attributes()
        );
    }

    public function testGetCountry()
    {
        $model = new City();
        $this->assertInstanceOf(CountryQuery::class, $model->getCountry());
    }

    public function testGetRegion()
    {
        $model = new City();
        $this->assertInstanceOf(RegionQuery::class, $model->getRegion());
    }

    public function testGetList()
    {
        $this->assertEquals(['1' => '1', '3' => 'г. Санкт-Петербург'], City::getList(1));
    }
}
