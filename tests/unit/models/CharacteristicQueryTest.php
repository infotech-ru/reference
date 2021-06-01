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
        self::assertInstanceOf(ActiveQuery::class, new CharacteristicQuery(Characteristic::class));
    }

    public function testIsMain()
    {
        $query = new CharacteristicQuery(Characteristic::class);
        self::assertEquals($query, $query->isMain());
        self::assertEquals(['car_characteristic.is_main' => true], $query->where);

        $query = new CharacteristicQuery(Characteristic::class);
        self::assertEquals($query, $query->isMain(1));
        self::assertEquals(['car_characteristic.is_main' => 1], $query->where);
    }
}
