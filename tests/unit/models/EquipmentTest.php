<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\CatalogEmplacementQuery;
use infotech\reference\models\CharacteristicValueQuery;
use infotech\reference\models\CountryQuery;
use infotech\reference\models\Equipment;
use infotech\reference\models\EquipmentCatalogEmplacementQuery;
use infotech\reference\models\EquipmentCountryQuery;
use infotech\reference\models\EquipmentQuery;
use infotech\reference\models\ModelQuery;
use infotech\reference\models\ModelYearEquipmentQuery;
use infotech\reference\models\ModelYearQuery;
use infotech\reference\models\ModificationEquipmentQuery;
use infotech\reference\models\ModificationQuery;
use infotech\reference\models\OptionQuery;
use infotech\reference\models\SerieQuery;
use infotech\reference\tests\fixtures\EquipmentFixture;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class EquipmentTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            EquipmentFixture::class,
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
        $this->assertNotNull(new Equipment());
    }

    public function testTableName()
    {
        $this->assertEquals('eqt_equipment', Equipment::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(EquipmentQuery::class, Equipment::find());
    }

    public function testGetModel()
    {
        $model = new Equipment();
        $this->assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testGetSerie()
    {
        $model = new Equipment();
        $this->assertInstanceOf(SerieQuery::class, $model->getSerie());
    }

    public function testGetCatalogEmplacements()
    {
        $model = new Equipment();
        $this->assertInstanceOf(CatalogEmplacementQuery::class, $model->getCatalogEmplacements());
    }

    public function testGetCountry()
    {
        $model = new Equipment();
        $this->assertInstanceOf(CountryQuery::class, $model->getCountry());
    }

    public function testGetOptions()
    {
        $model = new Equipment();
        $this->assertInstanceOf(OptionQuery::class, $model->getOptions());
    }

    public function testGetCharacteristicValues()
    {
        $model = new Equipment();
        $this->assertInstanceOf(CharacteristicValueQuery::class, $model->getCharacteristicValues());
    }

    public function testAttributes()
    {
        $model = new Equipment();
        $this->assertEquals(
            [
                'id',
                'model_id',
                'series_id',
                'name',
                'archive_name',
                'tech_name',
                'order',
                'status',
                'created_at',
                'updated_at',
                'origin_id',
                'country_id',
            ],
            $model->attributes()
        );
    }

    public function testGetList()
    {
        $this->assertEquals(['1' => '1'], Equipment::getList(1, true));
        $this->assertEquals(['1' => '1', '2' => '2'], Equipment::getList(1, false));
    }

    public function testGetModelYearEquipments()
    {
        $model = new Equipment();
        $this->assertInstanceOf(ModelYearEquipmentQuery::class, $model->getModelYearEquipments());
    }

    public function testGetModelYears()
    {
        $model = new Equipment();
        $this->assertInstanceOf(ModelYearQuery::class, $model->getModelYears());
    }

    public function testGetModificationEquipments()
    {
        $model = new Equipment();
        $this->assertInstanceOf(ModificationEquipmentQuery::class, $model->getModificationEquipments());
    }

    public function testGetModifications()
    {
        $model = new Equipment();
        $this->assertInstanceOf(ModificationQuery::class, $model->getModifications());
    }

    public function testGetEquipmentCountries()
    {
        $model = new Equipment();
        $this->assertInstanceOf(EquipmentCountryQuery::class, $model->getEquipmentCountries());
    }

    public function testGetCountries()
    {
        $model = new Equipment();
        $this->assertInstanceOf(CountryQuery::class, $model->getCountries());
    }

    public function testGetEquipmentCatalogEmplacements()
    {
        $model = new Equipment();
        $this->assertInstanceOf(EquipmentCatalogEmplacementQuery::class, $model->getEquipmentCatalogEmplacements());
    }
}
