<?php

namespace infotech\reference\tests\unit;


use infotech\reference\ActiveQuery;
use infotech\reference\Body;
use infotech\reference\BodyQuery;
use PHPUnit\Framework\TestCase;

class BodyQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new BodyQuery(Body::class));
    }
}