<?php

namespace infotech\reference\tests\unit;


use infotech\reference\EmplacementQuery;
use infotech\reference\ForeshorteningQuery;
use infotech\reference\Image;
use infotech\reference\ImageQuery;
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new Image());
    }

    public function testTableName()
    {
        $this->assertEquals('eqt_catalog_image', Image::tableName());
    }

    public function testPrimaryKey()
    {
        $this->assertEquals(['emplacement_id', 'foreshortening_id'], Image::primaryKey());
    }

    public function testFind()
    {
        $this->assertInstanceOf(ImageQuery::class, Image::find());
    }

    public function testGetEmplacement()
    {
        $model = new Image();
        $this->assertInstanceOf(EmplacementQuery::class, $model->getEmplacement());
    }

    public function testGetForeshortening()
    {
        $model = new Image();
        $this->assertInstanceOf(ForeshorteningQuery::class, $model->getForeshortening());
    }

    public function testAttributes()
    {
        $model = new Image();
        $this->assertEquals(
            [
                'emplacement_id',
                'foreshortening_id',
                'url',
                'is_main',
                'is_serie_main',
                'created_at',
                'updated_at',
            ],
            $model->attributes()
        );
    }
}