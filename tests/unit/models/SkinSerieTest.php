<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\SerieQuery;
use infotech\reference\models\SkinQuery;
use infotech\reference\models\SkinSerie;
use infotech\reference\models\SkinSerieQuery;
use infotech\reference\tests\fixtures\SkinSerieFixture;
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
        self::assertNotNull(new SkinSerie());
    }

    public function testTableName()
    {
        self::assertEquals('skin_serie', SkinSerie::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(SkinSerieQuery::class, SkinSerie::find());
    }

    public function testAttributes()
    {
        $model = new SkinSerie();
        self::assertEquals(
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
        self::assertInstanceOf(SkinQuery::class, $model->getSkin());
    }

    public function testGetSerie()
    {
        $model = new SkinSerie();
        self::assertInstanceOf(SerieQuery::class, $model->getSerie());
    }
}
