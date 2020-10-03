<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\CharacteristicValue;
use infotech\reference\models\CharacteristicValueQuery;
use PHPUnit\Framework\TestCase;

class CharacteristicValueQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new CharacteristicValueQuery(CharacteristicValue::class));
    }
}
