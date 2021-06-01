<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\CatalogEmplacementQuery;
use infotech\reference\models\EquipmentCatalogEmplacement;
use infotech\reference\models\EquipmentCatalogEmplacementQuery;
use infotech\reference\models\EquipmentQuery;
use infotech\reference\tests\fixtures\EquipmentCatalogEmplacementFixture;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class EquipmentCatalogEmplacementTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            EquipmentCatalogEmplacementFixture::class,
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
        self::assertNotNull(new EquipmentCatalogEmplacement());
    }

    public function testTableName()
    {
        self::assertEquals('eqt_equipment_catalog_emplacement', EquipmentCatalogEmplacement::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(EquipmentCatalogEmplacementQuery::class, EquipmentCatalogEmplacement::find());
    }

    public function testAttributes()
    {
        $model = new EquipmentCatalogEmplacement();
        self::assertEquals(
            [
                'catalog_emplacement_id',
                'equipment_id',
            ],
            $model->attributes()
        );
    }

    public function testGetEquipment()
    {
        $model = new EquipmentCatalogEmplacement();
        self::assertInstanceOf(EquipmentQuery::class, $model->getEquipment());
    }

    public function testGetCatalogEmplacement()
    {
        $model = new EquipmentCatalogEmplacement();
        self::assertInstanceOf(CatalogEmplacementQuery::class, $model->getCatalogEmplacement());
    }
}
