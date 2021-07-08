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
        self::assertInstanceOf(ActiveQuery::class, new CatalogEmplacementQuery(CatalogEmplacement::class));
    }

    public function testIsMain()
    {
        $query = new CatalogEmplacementQuery(CatalogEmplacement::class);
        self::assertEquals($query, $query->isMain());
        self::assertEquals(['eqt_catalog_emplacement.is_main' => true], $query->where);

        $query = new CatalogEmplacementQuery(CatalogEmplacement::class);
        self::assertEquals($query, $query->isMain(1));
        self::assertEquals(['eqt_catalog_emplacement.is_main' => 1], $query->where);
    }
}
