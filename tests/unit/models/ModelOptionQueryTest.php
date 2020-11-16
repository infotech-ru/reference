<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\ModelOption;
use infotech\reference\models\ModelOptionQuery;
use PHPUnit\Framework\TestCase;

class ModelOptionQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new ModelOptionQuery(ModelOption::class));
    }

    public function testModel()
    {
        $query = new ModelOptionQuery(ModelOption::class);
        $this->assertEquals($query, $query->model(1));
        $this->assertEquals(['eqt_model_option.model_id' => 1], $query->where);

        $query = new ModelOptionQuery(ModelOption::class);
        $this->assertEquals($query, $query->model([1, 2]));
        $this->assertEquals(['eqt_model_option.model_id' => [1, 2]], $query->where);
    }

    public function testOptionGroup()
    {
        $query = new ModelOptionQuery(ModelOption::class);
        $this->assertEquals($query, $query->optionGroup(1));
        $this->assertEquals(['eqt_model_option.option_group_id' => 1], $query->where);

        $query = new ModelOptionQuery(ModelOption::class);
        $this->assertEquals($query, $query->optionGroup([1, 2]));
        $this->assertEquals(['eqt_model_option.option_group_id' => [1, 2]], $query->where);
    }

    public function testModelOptionTag()
    {
        $query = new ModelOptionQuery(ModelOption::class);
        $this->assertEquals($query, $query->modelOptionTag(1));
        $this->assertEquals(['eqt_model_option.model_option_tag_id' => 1], $query->where);

        $query = new ModelOptionQuery(ModelOption::class);
        $this->assertEquals($query, $query->modelOptionTag([1, 2]));
        $this->assertEquals(['eqt_model_option.model_option_tag_id' => [1, 2]], $query->where);
    }
}
