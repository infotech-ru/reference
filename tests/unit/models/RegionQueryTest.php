<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\Region;
use infotech\reference\models\RegionQuery;
use PHPUnit\Framework\TestCase;

class RegionQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new RegionQuery(Region::class));
    }

    public function testName()
    {
        $query = new RegionQuery(Region::class);
        $query->name('Ленинградская');

        $this->assertEquals(['like', 'name', 'Ленинградская'], $query->where);
        $this->assertEquals(1, count($query->all()));
    }
}
