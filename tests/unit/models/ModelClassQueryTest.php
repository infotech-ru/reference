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
        $this->assertInstanceOf(ActiveQuery::class, new ModelClassQuery(ModelClass::class));
    }

    public function testStatus()
    {
        $query = new ModelClassQuery(ModelClass::class);
        $this->assertEquals($query, $query->status(0));
        $this->assertEquals(['model_class.status' => 0], $query->where);

        $query = new ModelClassQuery(ModelClass::class);
        $this->assertEquals($query, $query->status([1, 2]));
        $this->assertEquals(['model_class.status' => [1, 2]], $query->where);
    }
}
