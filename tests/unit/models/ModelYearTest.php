<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\ModelQuery;
use infotech\reference\models\ModelYear;
use infotech\reference\models\ModelYearQuery;
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

    public function testAttributes()
    {
        $model = new ModelYear();
        $this->assertEquals(
            [
                'id',
                'model_id',
                'year',
                'is_recent',
                'is_default',
            ],
            $model->attributes()
        );
    }

    public function testGetList()
    {
        $this->assertEquals(['1' => '1'], ModelYear::getList(1, true));
        $this->assertEquals(['1' => '1', '2' => '2'], ModelYear::getList(1, false));
    }
}