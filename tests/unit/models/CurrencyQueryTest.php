<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\Currency;
use infotech\reference\models\CurrencyQuery;
use PHPUnit\Framework\TestCase;

class CurrencyQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new CurrencyQuery(Currency::class));
    }
}
