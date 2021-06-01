<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\Brand;
use infotech\reference\models\BrandQuery;
use PHPUnit\Framework\TestCase;

class BrandQueryTest extends TestCase
{
    public function testConstructor()
    {
        self::assertInstanceOf(ActiveQuery::class, new BrandQuery(Brand::class));
    }

    public function testIsSupported()
    {
        $query = new BrandQuery(Brand::class);
        self::assertEquals($query, $query->isSupported());
        self::assertEquals(['brands.is_supported' => true], $query->where);

        $query = new BrandQuery(Brand::class);
        self::assertEquals($query, $query->isSupported(1));
        self::assertEquals(['brands.is_supported' => 1], $query->where);
    }
}
