<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\EquipmentCatalogEmplacement;
use infotech\reference\models\EquipmentCatalogEmplacementQuery;
use PHPUnit\Framework\TestCase;

class EquipmentCatalogEmplacementQueryTest extends TestCase
{
    public function testConstructor()
    {
        self::assertInstanceOf(
            ActiveQuery::class,
            new EquipmentCatalogEmplacementQuery(EquipmentCatalogEmplacement::class)
        );
    }
}
