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

    public function testIsMain()
    {
        $query = new ImageQuery(Image::class);
        $query->isMain();
        $this->assertEquals(['eqt_catalog_image.is_main' => true], $query->where);

        $query = new ImageQuery(Image::class);
        $query->isMain(1);
        $this->assertEquals(['eqt_catalog_image.is_main' => 1], $query->where);
    }

    public function testIsSerieMain()
    {
        $query = new ImageQuery(Image::class);
        $query->isSerieMain();
        $this->assertEquals(['eqt_catalog_image.is_serie_main' => true], $query->where);

        $query = new ImageQuery(Image::class);
        $query->isSerieMain(1);
        $this->assertEquals(['eqt_catalog_image.is_serie_main' => 1], $query->where);
    }
}