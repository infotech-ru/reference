<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\ActiveQuery;
use infotech\reference\models\ModelSegment;
use infotech\reference\models\ModelSegmentQuery;
use PHPUnit\Framework\TestCase;

class ModelSegmentQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new ModelSegmentQuery(ModelSegment::class));
    }

    public function testStatus()
    {
        $query = new ModelSegmentQuery(ModelSegment::class);
        $this->assertEquals($query, $query->status(0));
        $this->assertEquals(['model_segment.status' => 0], $query->where);

        $query = new ModelSegmentQuery(ModelSegment::class);
        $this->assertEquals($query, $query->status([1, 2]));
        $this->assertEquals(['model_segment.status' => [1, 2]], $query->where);
    }
}