<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\Region;
use infotech\reference\models\RegionQuery;
use infotech\reference\tests\fixtures\RegionFixture;
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
        $this->assertInstanceOf(ActiveQuery::class, new RegionQuery(Region::class));
    }

    public function testName()
    {
        $query = new RegionQuery(Region::class);
        $query->name('Ленинградская');

        $this->assertEquals(['like', 'regions.name', 'Ленинградская'], $query->where);
        $this->assertEquals(1, count($query->all()));
    }

    public function testStatus()
    {
        $query = new RegionQuery(Region::class);
        $query->status(3);

        $this->assertEquals(['regions.status' => 3], $query->where);
        $this->assertEquals(0, count($query->all()));
    }
}
