<?php

namespace infotech\reference\tests\unit;


use infotech\reference\ActiveQuery;
use infotech\reference\ModelOption;
use infotech\reference\ModelOptionQuery;
use PHPUnit\Framework\TestCase;

class ModelOptionQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new ModelOptionQuery(ModelOption::class));
    }
}