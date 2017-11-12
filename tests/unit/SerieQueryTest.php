<?php

namespace infotech\reference\tests\unit;


use infotech\reference\ActiveQuery;
use infotech\reference\Serie;
use infotech\reference\SerieQuery;
use PHPUnit\Framework\TestCase;

class SerieQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new SerieQuery(Serie::class));
    }

    public function testIsRecent()
    {
        $query = new SerieQuery(Serie::class);
        $query->isRecent();
        $this->assertEquals(['car_serie.is_recent' => true], $query->where);

        $query = new SerieQuery(Serie::class);
        $query->isRecent(1);
        $this->assertEquals(['car_serie.is_recent' => 1], $query->where);
    }

    public function testIsVisible()
    {
        $query = new SerieQuery(Serie::class);
        $query->isVisible();
        $this->assertEquals(['car_serie.is_visible' => true], $query->where);

        $query = new SerieQuery(Serie::class);
        $query->isVisible(1);
        $this->assertEquals(['car_serie.is_visible' => 1], $query->where);
    }
}