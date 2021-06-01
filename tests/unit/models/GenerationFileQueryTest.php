<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\GenerationFile;
use infotech\reference\models\GenerationFileQuery;
use PHPUnit\Framework\TestCase;

class GenerationFileQueryTest extends TestCase
{
    public function testConstructor()
    {
        self::assertInstanceOf(ActiveQuery::class, new GenerationFileQuery(GenerationFile::class));
    }
}
