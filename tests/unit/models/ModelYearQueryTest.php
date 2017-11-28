<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\ActiveQuery;
use infotech\reference\models\ModelYear;
use infotech\reference\models\ModelYearQuery;
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

    public function testModel()
    {
        $query = new ModelYearQuery(ModelYear::class);
        $query->model(1);
        $this->assertEquals(['model_year.model_id' => 1], $query->where);

        $query = new ModelYearQuery(ModelYear::class);
        $query->model([1, 2]);
        $this->assertEquals(['model_year.model_id' => [1, 2]], $query->where);
    }
}