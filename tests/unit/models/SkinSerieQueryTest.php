<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\SkinSerie;
use infotech\reference\models\SkinSerieQuery;
use PHPUnit\Framework\TestCase;

class SkinSerieQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new SkinSerieQuery(SkinSerie::class));
    }
}
