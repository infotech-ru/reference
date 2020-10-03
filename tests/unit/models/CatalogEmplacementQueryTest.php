<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\CatalogEmplacement;
use infotech\reference\models\CatalogEmplacementQuery;
use PHPUnit\Framework\TestCase;

class CatalogEmplacementQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new CatalogEmplacementQuery(CatalogEmplacement::class));
    }

    public function testIsMain()
    {
        $query = new CatalogEmplacementQuery(CatalogEmplacement::class);
        $this->assertEquals($query, $query->isMain());
        $this->assertEquals(['eqt_catalog_emplacement.is_main' => true], $query->where);

        $query = new CatalogEmplacementQuery(CatalogEmplacement::class);
        $this->assertEquals($query, $query->isMain(1));
        $this->assertEquals(['eqt_catalog_emplacement.is_main' => 1], $query->where);
    }
}
