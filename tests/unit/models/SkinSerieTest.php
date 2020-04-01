<?php

namespace infotech\reference\tests\unit\models;


use app\fixtures\SkinSerieFixture;
use infotech\reference\models\SerieQuery;
use infotech\reference\models\SkinQuery;
use infotech\reference\models\SkinSerie;
use infotech\reference\models\SkinSerieQuery;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class SkinSerieTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            SkinSerieFixture::class,
        ];
    }

    public function setUp(): void
    {
        $this->loadFixtures();
    }

    public function tearDown(): void
    {
        $this->unloadFixtures();
    }

    public function testConstructor()
    {
        $this->assertNotNull(new SkinSerie());
    }

    public function testTableName()
    {
        $this->assertEquals('skin_serie', SkinSerie::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(SkinSerieQuery::class, SkinSerie::find());
    }

    public function testAttributes()
    {
        $model = new SkinSerie();
        $this->assertEquals(
            [
                'skin_id',
                'serie_id',
            ],
            $model->attributes()
        );
    }

    public function testGetSkin()
    {
        $model = new SkinSerie();
        $this->assertInstanceOf(SkinQuery::class, $model->getSkin());
    }

    public function testGetSerie()
    {
        $model = new SkinSerie();
        $this->assertInstanceOf(SerieQuery::class, $model->getSerie());
    }
}