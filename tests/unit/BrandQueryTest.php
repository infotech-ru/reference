<?php

namespace infotech\reference\tests\unit;


use infotech\reference\ActiveQuery;
use infotech\reference\Brand;
use infotech\reference\BrandQuery;
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