<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\CityQuery;
use infotech\reference\models\CountryQuery;
use infotech\reference\models\FederalDistrictQuery;
use infotech\reference\models\Region;
use infotech\reference\models\RegionQuery;
use infotech\reference\tests\fixtures\RegionFixture;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class RegionTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            RegionFixture::class,
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
        self::assertNotNull(new Region());
    }

    public function testTableName()
    {
        self::assertEquals('regions', Region::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(RegionQuery::class, Region::find());
    }

    public function testAttributes()
    {
        $model = new Region();
        self::assertEquals(
            [
                'id',
                'country_id',
                'federal_district_id',
                'name',
                'status',
                'timezone',
                'lat',
                'lng',
                'okato',
                'center_city_id',
                'iso_code',
                'kladr_code',
            ],
            $model->attributes()
        );
    }

    public function testGetCountry()
    {
        $model = new Region();
        self::assertInstanceOf(CountryQuery::class, $model->getCountry());
    }

    public function testGetFederalDistrict()
    {
        $model = new Region();
        self::assertInstanceOf(FederalDistrictQuery::class, $model->getFederalDistrict());
    }

    public function testGetCities()
    {
        $model = new Region();
        self::assertInstanceOf(CityQuery::class, $model->getCities());
    }

    public function testGetList()
    {
        self::assertEquals(['1' => '1', '2' => '2', '3' => 'Ленинградская область'], Region::getList(1, null));
        self::assertEquals(['5' => '5'], Region::getList(2, null));
    }

    public function testStatuses()
    {
        self::assertEquals(0, Region::STATUS_ACTIVE);
        self::assertEquals(1, Region::STATUS_DELETED);
    }

    public function testGetStatusList()
    {
        self::assertEquals([0 => 'Активно', 1 => 'Удалено'], Region::getStatusList());
    }

    public function testGetListRegionsByCountry()
    {
        self::assertEquals(
            [
                'Россия' => [
                    1 => '1',
                    2 => '2',
                    3 => 'Ленинградская область',
                    4 => 'Московская область',
                ],
                'Беларусь' => [
                    5 => '5',
                ],
            ],
            Region::getListRegionsByCountry()
        );
    }

    public function testGetCenterCity()
    {
        $model = new Region();
        self::assertInstanceOf(CityQuery::class, $model->getCenterCity());
    }
}
