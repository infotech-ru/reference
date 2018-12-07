<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\EquipmentCountry;
use infotech\reference\models\EquipmentCountryQuery;
use PHPUnit\Framework\TestCase;

class EquipmentCountryQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new EquipmentCountryQuery(EquipmentCountry::class));
    }
}