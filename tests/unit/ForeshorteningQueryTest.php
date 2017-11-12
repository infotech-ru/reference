<?php

namespace infotech\reference\tests\unit;


use infotech\reference\ActiveQuery;
use infotech\reference\Foreshortening;
use infotech\reference\ForeshorteningQuery;
use PHPUnit\Framework\TestCase;

class ForeshorteningQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new ForeshorteningQuery(Foreshortening::class));
    }
}