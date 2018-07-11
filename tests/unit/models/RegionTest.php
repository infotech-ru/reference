<?php

namespace infotech\reference\tests\unit\models;

use app\fixtures\RegionFixture;
use infotech\reference\models\CityQuery;
use infotech\reference\models\CountryQuery;
use infotech\reference\models\FederalDistrictQuery;
use infotech\reference\models\Region;
use infotech\reference\models\RegionQuery;
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
        $this->assertNotNull(new Region());
    }

    public function testTableName()
    {
        $this->assertEquals('regions', Region::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(RegionQuery::class, Region::find());
    }

    public function testAttributes()
    {
        $model = new Region();
        $this->assertEquals(
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

            ],
            $model->attributes()
        );
    }

    public function testGetCountry()
    {
        $model = new Region();
        $this->assertInstanceOf(CountryQuery::class, $model->getCountry());
    }

    public function testGetFederalDistrict()
    {
        $model = new Region();
        $this->assertInstanceOf(FederalDistrictQuery::class, $model->getFederalDistrict());
    }

    public function testGetCities()
    {
        $model = new Region();
        $this->assertInstanceOf(CityQuery::class, $model->getCities());
    }

    public function testGetList()
    {
        $this->assertEquals(['1' => '1', '2' => '2', '3' => 'Ленинградская область'], Region::getList());
    }


    public function testStatuses()
    {
        $this->assertEquals(0, Region::STATUS_ACTIVE);
        $this->assertEquals(1, Region::STATUS_DELETED);
    }

    public function testGetStatusList()
    {
        $this->assertEquals([0 => 'Активно', 1 => 'Удалено'], Region::getStatusList());
    }
}
