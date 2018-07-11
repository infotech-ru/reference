<?php

namespace infotech\reference\tests\unit\models;


use app\fixtures\CountryFixture;
use infotech\reference\models\CityQuery;
use infotech\reference\models\Country;
use infotech\reference\models\CountryQuery;
use infotech\reference\models\RegionQuery;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class CountryTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            CountryFixture::class,
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
        $this->assertNotNull(new Country());
    }

    public function testTableName()
    {
        $this->assertEquals('countries', Country::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(CountryQuery::class, Country::find());
    }

    public function testAttributes()
    {
        $model = new Country();
        $this->assertEquals(
            [
                'id',
                'name',
                'phone_code',
                'alias',
            ],
            $model->attributes()
        );
    }

    public function testGetList()
    {
        $this->assertEquals(
            [
                '1' => 'Россия',
                '2' => 'Беларусь',
                '7' => 'Казахстан',
            ],
            Country::getList()
        );
    }

    public function testGetRegions()
    {
        $model = new Country();
        $this->assertInstanceOf(RegionQuery::class, $model->getRegions());
    }

    public function testGetCities()
    {
        $model = new Country();
        $this->assertInstanceOf(CityQuery::class, $model->getCities());
    }
}