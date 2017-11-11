<?php

namespace infotech\reference\tests\unit;


use infotech\reference\ActiveQuery;
use infotech\reference\OptionGroup;
use infotech\reference\OptionGroupQuery;
use PHPUnit\Framework\TestCase;

class OptionGroupQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new OptionGroupQuery(OptionGroup::class));
    }
}