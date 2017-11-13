<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\ModelOptionTag;
use infotech\reference\models\ModelOptionTagQuery;
use infotech\reference\models\ModelQuery;
use PHPUnit\Framework\TestCase;

class ModelOptionTagTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new ModelOptionTag());
    }

    public function testTableName()
    {
        $this->assertEquals('eqt_model_option_tag', ModelOptionTag::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(ModelOptionTagQuery::class, ModelOptionTag::find());
    }

    public function testGetModel()
    {
        $model = new ModelOptionTag();
        $this->assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testAttributes()
    {
        $model = new ModelOptionTag();
        $this->assertEquals(
            [
                'id',
                'model_id',
                'name',
            ],
            $model->attributes()
        );
    }
}