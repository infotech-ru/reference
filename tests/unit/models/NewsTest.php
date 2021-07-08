<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\BrandQuery;
use infotech\reference\models\News;
use infotech\reference\models\NewsBrandQuery;
use infotech\reference\models\NewsQuery;
use infotech\reference\tests\fixtures\NewsFixture;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class NewsTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            NewsFixture::class,
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
        self::assertNotNull(new News());
    }

    public function testTableName()
    {
        self::assertEquals('news', News::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(NewsQuery::class, News::find());
    }

    public function testAttributes()
    {
        $model = new News();
        self::assertEquals(['id', 'date_public', 'tags_bitmap', 'title', 'content',], $model->attributes());
    }

    public function testGetNewsBrands()
    {
        $model = new News();
        self::assertInstanceOf(NewsBrandQuery::class, $model->getNewsBrands());
    }

    public function testGetBrands()
    {
        $model = new News();
        self::assertInstanceOf(BrandQuery::class, $model->getBrands());
    }
}
