<?php

namespace infotech\reference\tests\unit;


use infotech\reference\ActiveQuery;
use infotech\reference\Image;
use infotech\reference\ImageQuery;
use PHPUnit\Framework\TestCase;

class ImageQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new ImageQuery(Image::class));
    }
}