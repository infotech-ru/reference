<?php

namespace infotech\reference\tests\unit;


use infotech\reference\ActiveQuery;
use infotech\reference\Emplacement;
use infotech\reference\EmplacementQuery;
use PHPUnit\Framework\TestCase;

class EmplacementQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new EmplacementQuery(Emplacement::class));
    }
}