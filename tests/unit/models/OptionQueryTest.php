<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\Option;
use infotech\reference\models\OptionQuery;
use PHPUnit\Framework\TestCase;

class OptionQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new OptionQuery(Option::class));
    }
}
