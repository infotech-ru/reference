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
        $this->assertNotNull(new OrderType());
    }

    public function testTableName()
    {
        $this->assertEquals('order_types', OrderType::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(OrderTypeQuery::class, OrderType::find());
    }

    public function testAttributes()
    {
        $model = new OrderType();
        $this->assertEquals(
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
        $this->assertInstanceOf(BrandQuery::class, $model->getBrand());
    }
}