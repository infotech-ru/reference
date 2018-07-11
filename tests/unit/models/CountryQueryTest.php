<?php

namespace infotech\reference\tests\unit\models;

use app\fixtures\CountryFixture;
use infotech\reference\models\ActiveQuery;
use infotech\reference\models\Country;
use infotech\reference\models\CountryQuery;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class CountryQueryTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            CountryFixture::class,
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
        $this->assertInstanceOf(ActiveQuery::class, new CountryQuery(Country::class));
    }

    public function testName()
    {
        $query = new CountryQuery(Country::class);
        $query->name('Россия');

        $this->assertEquals(['like', 'name', 'Россия'], $query->where);
        $this->assertEquals(1, count($query->all()));
    }
}
