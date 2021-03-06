<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\BrandQuery;
use infotech\reference\models\NewsBrand;
use infotech\reference\models\NewsBrandQuery;
use infotech\reference\models\NewsQuery;
use infotech\reference\tests\fixtures\NewsBrandFixture;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class NewsBrandTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            NewsBrandFixture::class,
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
        self::assertNotNull(new NewsBrand());
    }

    public function testTableName()
    {
        self::assertEquals('news_brand', NewsBrand::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(NewsBrandQuery::class, NewsBrand::find());
    }

    public function testGetNews()
    {
        $model = new NewsBrand();
        self::assertInstanceOf(NewsQuery::class, $model->getNews());
    }

    public function testGetBrand()
    {
        $model = new NewsBrand();
        self::assertInstanceOf(BrandQuery::class, $model->getBrand());
    }

    public function testAttributes()
    {
        $model = new NewsBrand();
        self::assertEquals(
            [
                'news_id',
                'brand_id',
            ],
            $model->attributes()
        );
    }
}
