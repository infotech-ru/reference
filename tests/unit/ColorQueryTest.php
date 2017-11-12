<?php

namespace infotech\reference\tests\unit;


use infotech\reference\ActiveQuery;
use infotech\reference\Color;
use infotech\reference\ColorQuery;
use PHPUnit\Framework\TestCase;

class ColorQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new ColorQuery(Color::class));
    }
}