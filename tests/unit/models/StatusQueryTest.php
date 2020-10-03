<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\Status;
use infotech\reference\models\StatusQuery;
use PHPUnit\Framework\TestCase;

class StatusQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new StatusQuery(Status::class));
    }
}
