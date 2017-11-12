<?php

namespace infotech\reference\tests\unit;


use infotech\reference\Generation;
use infotech\reference\GenerationQuery;
use infotech\reference\ModelQuery;
use infotech\reference\SerieQuery;
use PHPUnit\Framework\TestCase;

class GenerationTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new Generation());
    }

    public function testTableName()
    {
        $this->assertEquals('car_generation', Generation::tableName());
    }

    public function testPrimaryKey()
    {
        $this->assertEquals('id_car_generation', Generation::primaryKey());
    }

    public function testFind()
    {
        $this->assertInstanceOf(GenerationQuery::class, Generation::find());
    }

    public function testGetModel()
    {
        $model = new Generation();
        $this->assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testGetSeries()
    {
        $model = new Generation();
        $this->assertInstanceOf(SerieQuery::class, $model->getSeries());
    }

    public function testAttributes()
    {
        $model = new Generation();
        $this->assertEquals(
            [
                'id_car_generation',
                'name',
                'model_id',
                'year_begin',
                'year_end',
                'is_visible',
                'id_car_type',
                'is_recent',
                'origin_id',
            ],
            $model->attributes()
        );
    }
}