<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\Skin;
use infotech\reference\models\SkinQuery;
use PHPUnit\Framework\TestCase;

class SkinQueryTest extends TestCase
{
    public function testConstructor()
    {
        self::assertInstanceOf(ActiveQuery::class, new SkinQuery(Skin::class));
    }

    public function testGeneration()
    {
        $query = new SkinQuery(Skin::class);
        self::assertEquals($query, $query->model(1));
        self::assertEquals(['eqt_skin.model_id' => 1], $query->where);

        $query = new SkinQuery(Skin::class);
        self::assertEquals($query, $query->model([1, 2]));
        self::assertEquals(['eqt_skin.model_id' => [1, 2]], $query->where);
    }
}
