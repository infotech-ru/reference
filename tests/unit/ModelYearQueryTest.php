<?php

namespace infotech\reference\tests\unit;


use infotech\reference\ActiveQuery;
use infotech\reference\ModelYear;
use infotech\reference\ModelYearQuery;
use PHPUnit\Framework\TestCase;

class ModelYearQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new ModelYearQuery(ModelYear::class));
    }
}