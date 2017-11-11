<?php

namespace infotech\reference\tests\unit;


use infotech\reference\ModelQuery;
use infotech\reference\ModelYear;
use infotech\reference\ModelYearQuery;
use PHPUnit\Framework\TestCase;

class ModelYearTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new ModelYear());
    }

    public function testTableName()
    {
        $this->assertEquals('model_year', ModelYear::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(ModelYearQuery::class, ModelYear::find());
    }

    public function testGetModel()
    {
        $model = new ModelYear();
        $this->assertInstanceOf(ModelQuery::class, $model->getModel());
    }
}