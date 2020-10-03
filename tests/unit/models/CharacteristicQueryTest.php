<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\Characteristic;
use infotech\reference\models\CharacteristicQuery;
use PHPUnit\Framework\TestCase;

class CharacteristicQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new CharacteristicQuery(Characteristic::class));
    }

    public function testIsMain()
    {
        $query = new CharacteristicQuery(Characteristic::class);
        $this->assertEquals($query, $query->isMain());
        $this->assertEquals(['car_characteristic.is_main' => true], $query->where);

        $query = new CharacteristicQuery(Characteristic::class);
        $this->assertEquals($query, $query->isMain(1));
        $this->assertEquals(['car_characteristic.is_main' => 1], $query->where);
    }
}
