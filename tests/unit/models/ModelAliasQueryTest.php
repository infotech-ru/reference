<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\ModelAlias;
use infotech\reference\models\ModelAliasQuery;
use PHPUnit\Framework\TestCase;

class ModelAliasQueryTest extends TestCase
{
    public function testConstructor()
    {
        self::assertInstanceOf(ActiveQuery::class, new ModelAliasQuery(ModelAlias::class));
    }

    public function testBrand()
    {
        $query = new ModelAliasQuery(ModelAlias::class);
        self::assertEquals($query, $query->brand(1));
        self::assertEquals(['model_alias.brand_id' => 1], $query->where);

        $query = new ModelAliasQuery(ModelAlias::class);
        self::assertEquals($query, $query->brand([1, 2]));
        self::assertEquals(['model_alias.brand_id' => [1, 2]], $query->where);
    }

    public function testStatus()
    {
        $query = new ModelAliasQuery(ModelAlias::class);
        self::assertEquals($query, $query->status(1));
        self::assertEquals(['model_alias.status' => 1], $query->where);

        $query = new ModelAliasQuery(ModelAlias::class);
        self::assertEquals($query, $query->status([1, 2]));
        self::assertEquals(['model_alias.status' => [1, 2]], $query->where);
    }
}
