<?php

namespace infotech\reference\tests\unit;


use infotech\reference\ActiveQuery;
use infotech\reference\Modification;
use infotech\reference\ModificationQuery;
use PHPUnit\Framework\TestCase;

class ModificationQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new ModificationQuery(Modification::class));
    }
}