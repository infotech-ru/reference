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
        self::assertNotNull(new Equipment());
    }

    public function testTableName()
    {
        self::assertEquals('eqt_equipment', Equipment::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(EquipmentQuery::class, Equipment::find());
    }

    public function testGetModel()
    {
        $model = new Equipment();
        self::assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testGetSerie()
    {
        $model = new Equipment();
        self::assertInstanceOf(SerieQuery::class, $model->getSerie());
    }

    public function testGetCatalogEmplacements()
    {
        $model = new Equipment();
        self::assertInstanceOf(CatalogEmplacementQuery::class, $model->getCatalogEmplacements());
    }

    public function testGetCountry()
    {
        $model = new Equipment();
        self::assertInstanceOf(CountryQuery::class, $model->getCountry());
    }

    public function testGetOptions()
    {
        $model = new Equipment();
        self::assertInstanceOf(OptionQuery::class, $model->getOptions());
    }

    public function testGetCharacteristicValues()
    {
        $model = new Equipment();
        self::assertInstanceOf(CharacteristicValueQuery::class, $model->getCharacteristicValues());
    }

    public function testAttributes()
    {
        $model = new Equipment();
        self::assertEquals(
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
        self::assertEquals(['1' => '1'], Equipment::getList(1, true));
        self::assertEquals(['1' => '1', '2' => '2'], Equipment::getList(1, false));
    }

    public function testGetModelYearEquipments()
    {
        $model = new Equipment();
        self::assertInstanceOf(ModelYearEquipmentQuery::class, $model->getModelYearEquipments());
    }

    public function testGetModelYears()
    {
        $model = new Equipment();
        self::assertInstanceOf(ModelYearQuery::class, $model->getModelYears());
    }

    public function testGetModificationEquipments()
    {
        $model = new Equipment();
        self::assertInstanceOf(ModificationEquipmentQuery::class, $model->getModificationEquipments());
    }

    public function testGetModifications()
    {
        $model = new Equipment();
        self::assertInstanceOf(ModificationQuery::class, $model->getModifications());
    }

    public function testGetEquipmentCountries()
    {
        $model = new Equipment();
        self::assertInstanceOf(EquipmentCountryQuery::class, $model->getEquipmentCountries());
    }

    public function testGetCountries()
    {
        $model = new Equipment();
        self::assertInstanceOf(CountryQuery::class, $model->getCountries());
    }

    public function testGetEquipmentCatalogEmplacements()
    {
        $model = new Equipment();
        self::assertInstanceOf(EquipmentCatalogEmplacementQuery::class, $model->getEquipmentCatalogEmplacements());
    }
}
