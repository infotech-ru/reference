<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\ModificationEquipment;
use infotech\reference\models\ModificationEquipmentQuery;
use PHPUnit\Framework\TestCase;

class ModificationEquipmentQueryTest extends TestCase
{
    public function testConstructor()
    {
        self::assertInstanceOf(ActiveQuery::class, new ModificationEquipmentQuery(ModificationEquipment::class));
    }
}
