<?php

namespace infotech\reference\tests\unit\models;


use app\fixtures\BodyFixture;
use infotech\reference\models\Body;
use infotech\reference\models\BodyQuery;
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
        $this->assertNotNull(new Body());
    }

    public function testTableName()
    {
        $this->assertEquals('bodies', Body::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(BodyQuery::class, Body::find());
    }

    public function testAttributes()
    {
        $model = new Body();
        $this->assertEquals(
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
        $this->assertEquals([
            '1' => '1',
            '2' => '2',
        ], Body::getList());
    }
}