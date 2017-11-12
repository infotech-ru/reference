<?php

namespace infotech\reference\tests\unit;


use infotech\reference\ActiveQuery;
use infotech\reference\Option;
use infotech\reference\OptionQuery;
use PHPUnit\Framework\TestCase;

class OptionQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new OptionQuery(Option::class));
    }
}