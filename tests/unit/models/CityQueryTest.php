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
}