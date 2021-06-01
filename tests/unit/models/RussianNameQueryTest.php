<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\RussianName;
use infotech\reference\models\RussianNameQuery;
use PHPUnit\Framework\TestCase;

class RussianNameQueryTest extends TestCase
{
    public function testConstructor()
    {
        self::assertInstanceOf(ActiveQuery::class, new RussianNameQuery(RussianName::class));
    }
}
