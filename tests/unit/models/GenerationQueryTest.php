<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\ActiveQuery;
use infotech\reference\models\Generation;
use infotech\reference\models\GenerationQuery;
use PHPUnit\Framework\TestCase;

class GenerationQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new GenerationQuery(Generation::class));
    }

    public function testIsVisible()
    {
        $query = new GenerationQuery(Generation::class);
        $this->assertEquals($query, $query->isVisible());
        $this->assertEquals(['car_generation.is_visible' => true], $query->where);

        $query = new GenerationQuery(Generation::class);
        $this->assertEquals($query, $query->isVisible(1));
        $this->assertEquals(['car_generation.is_visible' => 1], $query->where);
    }

    public function testIsRecent()
    {
        $query = new GenerationQuery(Generation::class);
        $this->assertEquals($query, $query->isRecent());
        $this->assertEquals(['car_generation.is_recent' => true], $query->where);

        $query = new GenerationQuery(Generation::class);
        $this->assertEquals($query, $query->isRecent(1));
        $this->assertEquals(['car_generation.is_recent' => 1], $query->where);
    }

    public function testModel()
    {
        $query = new GenerationQuery(Generation::class);
        $this->assertEquals($query, $query->model(1));
        $this->assertEquals(['car_generation.model_id' => 1], $query->where);

        $query = new GenerationQuery(Generation::class);
        $this->assertEquals($query, $query->model([1, 2]));
        $this->assertEquals(['car_generation.model_id' => [1, 2]], $query->where);
    }
}