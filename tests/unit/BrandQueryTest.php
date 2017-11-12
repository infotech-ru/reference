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
}