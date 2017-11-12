<?php

namespace infotech\reference\tests\unit;


use infotech\reference\Body;
use infotech\reference\BodyQuery;
use PHPUnit\Framework\TestCase;

class BodyTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new Body());
    }

    public function testTableName()
    {
        $this->assertEquals('bodies', Body::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(BodyQuery::class, Body::find());
    }
}