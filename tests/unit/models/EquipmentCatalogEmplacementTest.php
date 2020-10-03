<?php

namespace infotech\reference\tests\unit\models;

use app\fixtures\EquipmentCatalogEmplacementFixture;
use infotech\reference\models\CatalogEmplacementQuery;
use infotech\reference\models\EquipmentCatalogEmplacement;
use infotech\reference\models\EquipmentCatalogEmplacementQuery;
use infotech\reference\models\EquipmentQuery;
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
        $this->assertNotNull(new EquipmentCatalogEmplacement());
    }

    public function testTableName()
    {
        $this->assertEquals('eqt_equipment_catalog_emplacement', EquipmentCatalogEmplacement::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(EquipmentCatalogEmplacementQuery::class, EquipmentCatalogEmplacement::find());
    }

    public function testAttributes()
    {
        $model = new EquipmentCatalogEmplacement();
        $this->assertEquals(
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
        $this->assertInstanceOf(EquipmentQuery::class, $model->getEquipment());
    }

    public function testGetCatalogEmplacement()
    {
        $model = new EquipmentCatalogEmplacement();
        $this->assertInstanceOf(CatalogEmplacementQuery::class, $model->getCatalogEmplacement());
    }
}
