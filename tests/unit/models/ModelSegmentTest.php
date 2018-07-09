<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\ModelSegment;
use infotech\reference\models\ModelSegmentQuery;
use PHPUnit\Framework\TestCase;

class ModelSegmentTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new ModelSegment());
    }

    public function testTableName()
    {
        $this->assertEquals('model_segment', ModelSegment::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(ModelSegmentQuery::class, ModelSegment::find());
    }

    public function testAttributes()
    {
        $model = new ModelSegment();
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
        $this->assertEquals(['1' => '1', '2' => '2'], ModelSegment::getList());
    }
}