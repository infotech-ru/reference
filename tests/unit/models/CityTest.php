<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\City;
use infotech\reference\models\CityQuery;
use infotech\reference\models\CountryQuery;
use infotech\reference\models\RegionQuery;
use PHPUnit\Framework\TestCase;

class CityTest extends TestCase
{
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
        $this->assertEquals(['1' => '1',], City::getList(1));
    }
}