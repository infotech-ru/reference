<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\CountryQuery;
use infotech\reference\models\FederalDistrict;
use infotech\reference\models\FederalDistrictQuery;
use infotech\reference\models\RegionQuery;
use infotech\reference\tests\fixtures\FederalDistrictFixture;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class FederalDistrictTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            FederalDistrictFixture::class,
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
        $this->assertNotNull(new FederalDistrict());
    }

    public function testTableName()
    {
        $this->assertEquals('federal_districts', FederalDistrict::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(FederalDistrictQuery::class, FederalDistrict::find());
    }

    public function testAttributes()
    {
        $model = new FederalDistrict();
        $this->assertEquals(
            [
                'id',
                'name',
                'short_name',
                'okato',
                'status',
                'country_id',
            ],
            $model->attributes()
        );
    }

    public function testGetRegions()
    {
        $model = new FederalDistrict();
        $this->assertInstanceOf(RegionQuery::class, $model->getRegions());
    }

    public function testGetCountry()
    {
        $model = new FederalDistrict();
        $this->assertInstanceOf(CountryQuery::class, $model->getCountry());
    }

    public function testStatuses()
    {
        $this->assertEquals(0, FederalDistrict::STATUS_ACTIVE);
        $this->assertEquals(1, FederalDistrict::STATUS_DELETED);
    }

    public function testGetStatusList()
    {
        $this->assertEquals([0 => 'Активно', 1 => 'Удалено'], FederalDistrict::getStatusList());
    }

    public function testGetList()
    {
        $this->assertEquals(['1' => '1'], FederalDistrict::getList(1));
        $this->assertEquals(['2' => '2'], FederalDistrict::getList(2));
        $this->assertEquals(['1' => '1', '2' => '2'], FederalDistrict::getList(null));
    }
}
