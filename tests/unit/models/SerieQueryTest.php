<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\ActiveQuery;
use infotech\reference\models\Serie;
use infotech\reference\models\SerieQuery;
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

    public function testGeneration()
    {
        $query = new SerieQuery(Serie::class);
        $query->generation(1);
        $this->assertEquals(['car_serie.id_car_generation' => 1], $query->where);

        $query = new SerieQuery(Serie::class);
        $query->generation([1, 2]);
        $this->assertEquals(['car_serie.id_car_generation' => [1, 2]], $query->where);
    }
}