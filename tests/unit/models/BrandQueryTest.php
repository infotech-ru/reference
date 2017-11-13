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
        $this->assertInstanceOf(ActiveQuery::class, new BrandQuery(Brand::class));
    }

    public function testIsRecent()
    {
        $query = new BrandQuery(Brand::class);
        $query->isSupported();
        $this->assertEquals(['brands.is_supported' => true], $query->where);

        $query = new BrandQuery(Brand::class);
        $query->isSupported(1);
        $this->assertEquals(['brands.is_supported' => 1], $query->where);
    }
}