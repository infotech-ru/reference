<?php

namespace infotech\reference\tests\unit\models;


use app\fixtures\EquipmentCountryFixture;
use infotech\reference\models\CountryQuery;
use infotech\reference\models\EquipmentCountry;
use infotech\reference\models\EquipmentCountryQuery;
use infotech\reference\models\EquipmentQuery;
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
        $this->assertNotNull(new EquipmentCountry());
    }

    public function testTableName()
    {
        $this->assertEquals('eqt_equipment_country', EquipmentCountry::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(EquipmentCountryQuery::class, EquipmentCountry::find());
    }

    public function testAttributes()
    {
        $model = new EquipmentCountry();
        $this->assertEquals(
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
        $this->assertInstanceOf(EquipmentQuery::class, $model->getEquipment());
    }

    public function testGetCountry()
    {
        $model = new EquipmentCountry();
        $this->assertInstanceOf(CountryQuery::class, $model->getCountry());
    }
}