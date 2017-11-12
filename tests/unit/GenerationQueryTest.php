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
}