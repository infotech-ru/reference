<?php

namespace infotech\reference\tests\unit;


use infotech\reference\ActiveQuery;
use infotech\reference\Generation;
use infotech\reference\GenerationQuery;
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
        $query->isVisible();
        $this->assertEquals(['car_generation.is_visible' => true], $query->where);

        $query = new GenerationQuery(Generation::class);
        $query->isVisible(1);
        $this->assertEquals(['car_generation.is_visible' => 1], $query->where);
    }

    public function testIsRecent()
    {
        $query = new GenerationQuery(Generation::class);
        $query->isRecent();
        $this->assertEquals(['car_generation.is_recent' => true], $query->where);

        $query = new GenerationQuery(Generation::class);
        $query->isRecent(1);
        $this->assertEquals(['car_generation.is_recent' => 1], $query->where);
    }

}