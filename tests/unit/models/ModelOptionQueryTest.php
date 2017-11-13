<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\ActiveQuery;
use infotech\reference\models\ModelOption;
use infotech\reference\models\ModelOptionQuery;
use PHPUnit\Framework\TestCase;

class ModelOptionQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new ModelOptionQuery(ModelOption::class));
    }
}