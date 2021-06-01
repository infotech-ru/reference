<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\BrandQuery;
use infotech\reference\models\OrderType;
use infotech\reference\models\OrderTypeQuery;
use PHPUnit\Framework\TestCase;

class OrderTypeTest extends TestCase
{
    public function testConstructor()
    {
        self::assertNotNull(new OrderType());
    }

    public function testTableName()
    {
        self::assertEquals('order_types', OrderType::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(OrderTypeQuery::class, OrderType::find());
    }

    public function testAttributes()
    {
        $model = new OrderType();
        self::assertEquals(
            [
                'code',
                'brand_id',
                'name',
                'ord',
            ],
            $model->attributes()
        );
    }

    public function testGetBrand()
    {
        $model = new OrderType();
        self::assertInstanceOf(BrandQuery::class, $model->getBrand());
    }

    public function testConstantNone()
    {
        self::assertEquals('None', OrderType::NONE);
    }

    public function testConstantContract()
    {
        self::assertEquals('Contract', OrderType::CONTRACT);
    }

    public function testConstantDelivery()
    {
        self::assertEquals('Delivery', OrderType::DELIVERY);
    }

    public function testConstantTEST()
    {
        self::assertEquals('TEST', OrderType::TEST);
    }
}
