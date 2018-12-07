<?php

namespace infotech\reference\tests\unit\models;


use app\fixtures\NewsBrandFixture;
use infotech\reference\models\BrandQuery;
use infotech\reference\models\NewsBrand;
use infotech\reference\models\NewsBrandQuery;
use infotech\reference\models\NewsQuery;
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

    public function setUp()
    {
        $this->loadFixtures();
    }

    public function tearDown()
    {
        $this->unloadFixtures();
    }

    public function testConstructor()
    {
        $this->assertNotNull(new NewsBrand());
    }

    public function testTableName()
    {
        $this->assertEquals('news_brand', NewsBrand::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(NewsBrandQuery::class, NewsBrand::find());
    }

    public function testGetNews()
    {
        $model = new NewsBrand();
        $this->assertInstanceOf(NewsQuery::class, $model->getNews());
    }

    public function testGetBrand()
    {
        $model = new NewsBrand();
        $this->assertInstanceOf(BrandQuery::class, $model->getBrand());
    }

    public function testAttributes()
    {
        $model = new NewsBrand();
        $this->assertEquals(
            [
                'news_id',
                'brand_id',
            ],
            $model->attributes()
        );
    }
}