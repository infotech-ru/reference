<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\OptionGroup;
use infotech\reference\models\OptionGroupQuery;
use PHPUnit\Framework\TestCase;

class OptionGroupQueryTest extends TestCase
{
    public function testConstructor()
    {
        self::assertInstanceOf(ActiveQuery::class, new OptionGroupQuery(OptionGroup::class));
    }

    public function testBrand()
    {
        $query = new OptionGroupQuery(OptionGroup::class);
        self::assertEquals($query, $query->brand(1));
        self::assertEquals(['eqt_option_group.brand_id' => 1], $query->where);

        $query = new OptionGroupQuery(OptionGroup::class);
        self::assertEquals($query, $query->brand([1, 2]));
        self::assertEquals(['eqt_option_group.brand_id' => [1, 2]], $query->where);
    }
}
