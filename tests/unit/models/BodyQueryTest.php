<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\ActiveQuery;
use infotech\reference\models\Body;
use infotech\reference\models\BodyQuery;
use PHPUnit\Framework\TestCase;

class BodyQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new BodyQuery(Body::class));
    }
}