<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\EquipmentModelImage;
use infotech\reference\models\EquipmentModelImageQuery;
use PHPUnit\Framework\TestCase;

class EquipmentModelImageQueryTest extends TestCase
{
    public function testConstructor()
    {
        self::assertInstanceOf(ActiveQuery::class, new EquipmentModelImageQuery(EquipmentModelImage::class));
    }
}
