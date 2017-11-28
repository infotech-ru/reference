<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\ActiveQuery;
use infotech\reference\models\Country;
use infotech\reference\models\CountryQuery;
use PHPUnit\Framework\TestCase;

class CountryQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new CountryQuery(Country::class));
    }
}