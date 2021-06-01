<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\CityQuery;
use infotech\reference\models\Country;
use infotech\reference\models\CountryQuery;
use infotech\reference\models\EquipmentCountryQuery;
use infotech\reference\models\EquipmentQuery;
use infotech\reference\models\RegionQuery;
use infotech\reference\tests\fixtures\CountryFixture;
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
        self::assertNotNull(new Country());
    }

    public function testTableName()
    {
        self::assertEquals('countries', Country::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(CountryQuery::class, Country::find());
    }

    public function testAttributes()
    {
        $model = new Country();
        self::assertEquals(
            [
                'id',
                'name',
                'phone_code',
                'alias',
                'nds'
            ],
            $model->attributes()
        );
    }

    public function testGetList()
    {
        self::assertEquals(
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
        self::assertInstanceOf(RegionQuery::class, $model->getRegions());
    }

    public function testGetCities()
    {
        $model = new Country();
        self::assertInstanceOf(CityQuery::class, $model->getCities());
    }

    public function testGetEquipmentCountries()
    {
        $model = new Country();
        self::assertInstanceOf(EquipmentCountryQuery::class, $model->getEquipmentCountries());
    }

    public function testGetEquipments()
    {
        $model = new Country();
        self::assertInstanceOf(EquipmentQuery::class, $model->getEquipments());
    }
}
