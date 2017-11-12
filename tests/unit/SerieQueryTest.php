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
}