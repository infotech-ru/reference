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
        self::assertNotNull(new FederalDistrict());
    }

    public function testTableName()
    {
        self::assertEquals('federal_districts', FederalDistrict::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(FederalDistrictQuery::class, FederalDistrict::find());
    }

    public function testAttributes()
    {
        $model = new FederalDistrict();
        self::assertEquals(
            [
                'id',
                'name',
                'short_name',
                'okato',
                'status',
                'country_id',
                'eng_name',
            ],
            $model->attributes()
        );
    }

    public function testGetRegions()
    {
        $model = new FederalDistrict();
        self::assertInstanceOf(RegionQuery::class, $model->getRegions());
    }

    public function testGetCountry()
    {
        $model = new FederalDistrict();
        self::assertInstanceOf(CountryQuery::class, $model->getCountry());
    }

    public function testStatuses()
    {
        self::assertEquals(0, FederalDistrict::STATUS_ACTIVE);
        self::assertEquals(1, FederalDistrict::STATUS_DELETED);
    }

    public function testGetStatusList()
    {
        self::assertEquals([0 => 'Активно', 1 => 'Удалено'], FederalDistrict::getStatusList());
    }

    public function testGetList()
    {
        self::assertEquals(['1' => '1'], FederalDistrict::getList(1));
        self::assertEquals(['2' => '2'], FederalDistrict::getList(2));
        self::assertEquals(['1' => '1', '2' => '2'], FederalDistrict::getList(null));
    }
}
