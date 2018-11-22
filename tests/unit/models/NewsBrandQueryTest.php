<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\ActiveQuery;
use infotech\reference\models\NewsBrand;
use infotech\reference\models\NewsBrandQuery;
use PHPUnit\Framework\TestCase;

class NewsBrandQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new NewsBrandQuery(NewsBrand::class));
    }
}