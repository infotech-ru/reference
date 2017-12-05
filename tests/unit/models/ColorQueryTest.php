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

    public function testModel()
    {
        $query = new ColorQuery(Color::class);
        $this->assertEquals($query, $query->model(1));
        $this->assertEquals(['eqt_color.model_id' => 1], $query->where);

        $query = new ColorQuery(Color::class);
        $this->assertEquals($query, $query->model([1, 2]));
        $this->assertEquals(['eqt_color.model_id' => [1, 2]], $query->where);
    }
}