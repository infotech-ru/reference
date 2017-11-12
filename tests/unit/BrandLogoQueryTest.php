<?php

namespace infotech\reference\tests\unit;


use infotech\reference\ActiveQuery;
use infotech\reference\BrandLogo;
use infotech\reference\BrandLogoQuery;
use PHPUnit\Framework\TestCase;

class BrandLogoQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new BrandLogoQuery(BrandLogo::class));
    }
}