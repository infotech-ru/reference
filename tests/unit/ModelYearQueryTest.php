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

    public function testIsRecent()
    {
        $query = new ModelYearQuery(ModelYear::class);
        $query->isRecent();
        $this->assertEquals(['model_year.is_recent' => true], $query->where);

        $query = new ModelYearQuery(ModelYear::class);
        $query->isRecent(1);
        $this->assertEquals(['model_year.is_recent' => 1], $query->where);
    }

    public function testIsDefault()
    {
        $query = new ModelYearQuery(ModelYear::class);
        $query->isDefault();
        $this->assertEquals(['model_year.is_default' => true], $query->where);

        $query = new ModelYearQuery(ModelYear::class);
        $query->isDefault(1);
        $this->assertEquals(['model_year.is_default' => 1], $query->where);
    }
}