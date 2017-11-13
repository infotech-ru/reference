<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\ActiveQuery;
use infotech\reference\models\Equipment;
use infotech\reference\models\EquipmentQuery;
use PHPUnit\Framework\TestCase;

class EquipmentQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new EquipmentQuery(Equipment::class));
    }
}