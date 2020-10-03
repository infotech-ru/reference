<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\ModelOptionTag;
use infotech\reference\models\ModelOptionTagQuery;
use PHPUnit\Framework\TestCase;

class ModelOptionTagQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new ModelOptionTagQuery(ModelOptionTag::class));
    }

    public function testIsVisible()
    {
        $query = new ModelOptionTagQuery(ModelOptionTag::class);
        $this->assertEquals($query, $query->model(1));
        $this->assertEquals(['eqt_model_option_tag.model_id' => 1], $query->where);

        $query = new ModelOptionTagQuery(ModelOptionTag::class);
        $this->assertEquals($query, $query->model([1, 2]));
        $this->assertEquals(['eqt_model_option_tag.model_id' => [1, 2]], $query->where);
    }
}
