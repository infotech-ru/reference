<?php

namespace infotech\reference\tests\unit;


use infotech\reference\Foreshortening;
use infotech\reference\ForeshorteningQuery;
use PHPUnit\Framework\TestCase;

class ForeshorteningTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new Foreshortening());
    }

    public function testTableName()
    {
        $this->assertEquals('eqt_catalog_foreshortening', Foreshortening::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(ForeshorteningQuery::class, Foreshortening::find());
    }
}