<?php

namespace infotech\reference\tests\unit;


use infotech\reference\ActiveQuery;
use infotech\reference\Equipment;
use infotech\reference\EquipmentQuery;
use PHPUnit\Framework\TestCase;

class EquipmentQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new EquipmentQuery(Equipment::class));
    }
}