<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\Body;
use infotech\reference\models\BodyQuery;
use infotech\reference\tests\fixtures\BodyFixture;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class BodyTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            BodyFixture::class,
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
        self::assertNotNull(new Body());
    }

    public function testTableName()
    {
        self::assertEquals('bodies', Body::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(BodyQuery::class, Body::find());
    }

    public function testAttributes()
    {
        $model = new Body();
        self::assertEquals(
            [
                'id',
                'name',
                'tradein_code',
            ],
            $model->attributes()
        );
    }

    public function testGetList()
    {
        self::assertEquals(
            [
                '1' => '1',
                '2' => '2',
            ],
            Body::getList()
        );
    }
}
