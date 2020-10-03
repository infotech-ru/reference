<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\OrderType;
use infotech\reference\models\OrderTypeQuery;
use PHPUnit\Framework\TestCase;

class OrderTypeQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new OrderTypeQuery(OrderType::class));
    }
}
