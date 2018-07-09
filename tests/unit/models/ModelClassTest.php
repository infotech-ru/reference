<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\ModelClass;
use infotech\reference\models\ModelClassQuery;
use PHPUnit\Framework\TestCase;

class ModelClassTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new ModelClass());
    }

    public function testTableName()
    {
        $this->assertEquals('model_class', ModelClass::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(ModelClassQuery::class, ModelClass::find());
    }

    public function testAttributes()
    {
        $model = new ModelClass();
        $this->assertEquals(
            [
                'id',
                'name',
                'status',
            ],
            $model->attributes()
        );
    }

    public function testGetList()
    {
        $this->assertEquals(['1' => '1', '2' => '2'], ModelClass::getList());
    }
}