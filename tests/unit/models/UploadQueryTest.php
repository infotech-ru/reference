<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\Upload;
use infotech\reference\models\UploadQuery;
use PHPUnit\Framework\TestCase;

class UploadQueryTest extends TestCase
{
    public function testConstructor()
    {
        self::assertInstanceOf(ActiveQuery::class, new UploadQuery(Upload::class));
    }
}
