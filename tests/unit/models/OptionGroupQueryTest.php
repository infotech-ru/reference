<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\ActiveQuery;
use infotech\reference\models\OptionGroup;
use infotech\reference\models\OptionGroupQuery;
use PHPUnit\Framework\TestCase;

class OptionGroupQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new OptionGroupQuery(OptionGroup::class));
    }
}