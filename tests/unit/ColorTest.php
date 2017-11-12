<?php

namespace infotech\reference\tests\unit;


use infotech\reference\Color;
use infotech\reference\ColorQuery;
use infotech\reference\EmplacementQuery;
use infotech\reference\ModelQuery;
use PHPUnit\Framework\TestCase;

class ColorTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new Color());
    }

    public function testTableName()
    {
        $this->assertEquals('eqt_color', Color::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(ColorQuery::class, Color::find());
    }

    public function testGetModel()
    {
        $model = new Color();
        $this->assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testGetCommonColor()
    {
        $model = new Color();
        $this->assertInstanceOf(ColorQuery::class, $model->getCommonColor());
    }

    public function testGetEmplacements()
    {
        $model = new Color();
        $this->assertInstanceOf(EmplacementQuery::class, $model->getEmplacements());
    }

    public function testAttributes()
    {
        $model = new Color();
        $this->assertEquals(
            [
                'id',
                'code',
                'model_id',
                'common_color_id',
                'rgb',
                'name',
                'created_at',
                'updated_at',
            ],
            $model->attributes()
        );
    }
}