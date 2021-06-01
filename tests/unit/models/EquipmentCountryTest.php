<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\CountryQuery;
use infotech\reference\models\EquipmentCountry;
use infotech\reference\models\EquipmentCountryQuery;
use infotech\reference\models\EquipmentQuery;
use infotech\reference\tests\fixtures\EquipmentCountryFixture;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class EquipmentCountryTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            EquipmentCountryFixture::class,
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
        self::assertNotNull(new EquipmentCountry());
    }

    public function testTableName()
    {
        self::assertEquals('eqt_equipment_country', EquipmentCountry::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(EquipmentCountryQuery::class, EquipmentCountry::find());
    }

    public function testAttributes()
    {
        $model = new EquipmentCountry();
        self::assertEquals(
            [
                'country_id',
                'equipment_id',
            ],
            $model->attributes()
        );
    }

    public function testGetEquipment()
    {
        $model = new EquipmentCountry();
        self::assertInstanceOf(EquipmentQuery::class, $model->getEquipment());
    }

    public function testGetCountry()
    {
        $model = new EquipmentCountry();
        self::assertInstanceOf(CountryQuery::class, $model->getCountry());
    }
}
