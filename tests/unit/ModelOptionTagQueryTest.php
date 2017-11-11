<?php

namespace infotech\reference\tests\unit;


use infotech\reference\ActiveQuery;
use infotech\reference\ModelOptionTag;
use infotech\reference\ModelOptionTagQuery;
use PHPUnit\Framework\TestCase;

class ModelOptionTagQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new ModelOptionTagQuery(ModelOptionTag::class));
    }
}