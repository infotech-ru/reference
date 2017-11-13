<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\ActiveQuery;
use infotech\reference\models\Color;
use infotech\reference\models\ColorQuery;
use PHPUnit\Framework\TestCase;

class ColorQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new ColorQuery(Color::class));
    }
}