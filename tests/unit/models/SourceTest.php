<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\Source;
use infotech\reference\models\SourceQuery;
use infotech\reference\tests\fixtures\SourceFixture;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class SourceTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            SourceFixture::class,
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
        self::assertNotNull(new Source());
    }

    public function testTableName()
    {
        self::assertEquals('sources', Source::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(SourceQuery::class, Source::find());
    }

    public function testGetParent()
    {
        $model = new Source();
        self::assertInstanceOf(SourceQuery::class, $model->getParent());
    }

    public function testAttributes()
    {
        $model = new Source();
        self::assertEquals(
            [
                'id',
                'name',
                'parent_id',
            ],
            $model->attributes()
        );
    }

    public function testGetList()
    {
        self::assertEquals(
            [
                '1' => '1',
                '2' => '- 2',
                '3' => '-- 3',
                '4' => '4',
                '5' => '- 5',
            ],
            Source::getList()
        );
    }
}
