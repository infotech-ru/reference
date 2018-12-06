<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\ActiveQuery;
use infotech\reference\models\ModelYearEquipment;
use infotech\reference\models\ModelYearEquipmentQuery;
use PHPUnit\Framework\TestCase;

class ModelYearEquipmentQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new ModelYearEquipmentQuery(ModelYearEquipment::class));
    }
}