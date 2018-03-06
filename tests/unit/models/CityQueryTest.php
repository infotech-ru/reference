<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\City;
use infotech\reference\models\CityQuery;
use PHPUnit\Framework\TestCase;

class CityQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new CityQuery(City::class));
    }

    public function testRegion()
    {
        $query = new CityQuery(City::class);
        $this->assertEquals($query, $query->region(1));
        $this->assertEquals(['cities.region_id' => 1], $query->where);

        $query = new CityQuery(City::class);
        $this->assertEquals($query, $query->region([1, 2]));
        $this->assertEquals(['cities.region_id' => [1, 2]], $query->where);
    }

    public function testName()
    {
        $query = new CityQuery(City::class);
        $query->name('Петербург');

        $this->assertEquals(['like', 'name', 'Петербург'], $query->where);
        $this->assertEquals(1, count($query->all()));
    }
}
