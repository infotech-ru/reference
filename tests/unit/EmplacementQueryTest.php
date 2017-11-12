<?php

namespace infotech\reference\tests\unit;


use infotech\reference\ActiveQuery;
use infotech\reference\Emplacement;
use infotech\reference\EmplacementQuery;
use PHPUnit\Framework\TestCase;

class EmplacementQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new EmplacementQuery(Emplacement::class));
    }

    public function testIsRecent()
    {
        $query = new EmplacementQuery(Emplacement::class);
        $query->isMain();
        $this->assertEquals(['eqt_catalog_emplacement.is_main' => true], $query->where);

        $query = new EmplacementQuery(Emplacement::class);
        $query->isMain(1);
        $this->assertEquals(['eqt_catalog_emplacement.is_main' => 1], $query->where);
    }
}