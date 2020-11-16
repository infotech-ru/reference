<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\ModelImage;
use infotech\reference\models\ModelImageQuery;
use PHPUnit\Framework\TestCase;

class ModelImageQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new ModelImageQuery(ModelImage::class));
    }
}
