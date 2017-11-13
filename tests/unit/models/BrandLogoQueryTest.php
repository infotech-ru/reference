<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\ActiveQuery;
use infotech\reference\models\BrandLogo;
use infotech\reference\models\BrandLogoQuery;
use PHPUnit\Framework\TestCase;

class BrandLogoQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new BrandLogoQuery(BrandLogo::class));
    }
}