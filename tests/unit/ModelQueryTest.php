<?php

namespace infotech\reference\tests\unit;


use infotech\reference\ActiveQuery;
use infotech\reference\Model;
use infotech\reference\ModelQuery;
use PHPUnit\Framework\TestCase;

class ModelQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new ModelQuery(Model::class));
    }
}