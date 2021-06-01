<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\ModelClass;
use infotech\reference\models\ModelClassQuery;
use PHPUnit\Framework\TestCase;

class ModelClassQueryTest extends TestCase
{
    public function testConstructor()
    {
        self::assertInstanceOf(ActiveQuery::class, new ModelClassQuery(ModelClass::class));
    }

    public function testStatus()
    {
        $query = new ModelClassQuery(ModelClass::class);
        self::assertEquals($query, $query->status(0));
        self::assertEquals(['model_class.status' => 0], $query->where);

        $query = new ModelClassQuery(ModelClass::class);
        self::assertEquals($query, $query->status([1, 2]));
        self::assertEquals(['model_class.status' => [1, 2]], $query->where);
    }
}
