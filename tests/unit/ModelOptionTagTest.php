<?php

namespace infotech\reference\tests\unit;


use infotech\reference\ModelOptionTag;
use infotech\reference\ModelOptionTagQuery;
use infotech\reference\ModelQuery;
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
}