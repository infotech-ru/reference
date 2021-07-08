<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\ModelVideo;
use infotech\reference\models\ModelVideoQuery;
use PHPUnit\Framework\TestCase;

class ModelVideoQueryTest extends TestCase
{
    public function testConstructor()
    {
        self::assertInstanceOf(ActiveQuery::class, new ModelVideoQuery(ModelVideo::class));
    }
}
