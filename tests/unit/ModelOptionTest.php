<?php

namespace infotech\reference\tests\unit;


use infotech\reference\ModelOption;
use infotech\reference\ModelOptionQuery;
use infotech\reference\ModelOptionTagQuery;
use infotech\reference\ModelQuery;
use infotech\reference\OptionGroupQuery;
use PHPUnit\Framework\TestCase;

class ModelOptionTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new ModelOption());
    }

    public function testTableName()
    {
        $this->assertEquals('eqt_model_option', ModelOption::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(ModelOptionQuery::class, ModelOption::find());
    }

    public function testGetModel()
    {
        $model = new ModelOption();
        $this->assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testGetOptionGroup()
    {
        $model = new ModelOption();
        $this->assertInstanceOf(OptionGroupQuery::class, $model->getOptionGroup());
    }

    public function testGetModelOptionTag()
    {
        $model = new ModelOption();
        $this->assertInstanceOf(ModelOptionTagQuery::class, $model->getModelOptionTag());
    }

    public function testAttributes()
    {
        $model = new ModelOption();
        $this->assertEquals(
            [
                'id',
                'model_id',
                'option_group_id',
                'model_option_tag_id',
                'name',
                'created_at',
                'updated_at',
            ],
            $model->attributes()
        );
    }
}