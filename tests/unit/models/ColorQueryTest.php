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
        self::assertInstanceOf(ActiveQuery::class, new ColorQuery(Color::class));
    }

    public function testModel()
    {
        $query = new ColorQuery(Color::class);
        self::assertEquals($query, $query->model(1));
        self::assertEquals(['eqt_color.model_id' => 1], $query->where);

        $query = new ColorQuery(Color::class);
        self::assertEquals($query, $query->model([1, 2]));
        self::assertEquals(['eqt_color.model_id' => [1, 2]], $query->where);
    }
}
