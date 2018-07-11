<?php

namespace infotech\reference\tests\unit\models;

use app\fixtures\RegionFixture;
use infotech\reference\models\ActiveQuery;
use infotech\reference\models\Region;
use infotech\reference\models\RegionQuery;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class RegionQueryTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            RegionFixture::class,
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
        $this->assertInstanceOf(ActiveQuery::class, new RegionQuery(Region::class));
    }

    public function testName()
    {
        $query = new RegionQuery(Region::class);
        $query->name('Ленинградская');

        $this->assertEquals(['like', 'name', 'Ленинградская'], $query->where);
        $this->assertEquals(1, count($query->all()));
    }
}
