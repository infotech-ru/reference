<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\Source;
use infotech\reference\models\SourceQuery;
use PHPUnit\Framework\TestCase;

class SourceQueryTest extends TestCase
{
    public function testConstructor()
    {
        self::assertInstanceOf(ActiveQuery::class, new SourceQuery(Source::class));
    }
}
