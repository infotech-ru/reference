<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\EquipmentQuery;
use infotech\reference\models\ModificationEquipment;
use infotech\reference\models\ModificationEquipmentQuery;
use infotech\reference\models\ModificationQuery;
use infotech\reference\tests\fixtures\ModificationEquipmentFixture;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class ModificationEquipmentTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            ModificationEquipmentFixture::class,
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
        self::assertNotNull(new ModificationEquipment());
    }

    public function testTableName()
    {
        self::assertEquals('modification_equipment', ModificationEquipment::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(ModificationEquipmentQuery::class, ModificationEquipment::find());
    }

    public function testAttributes()
    {
        $model = new ModificationEquipment();
        self::assertEquals(
            [
                'modification_id',
                'equipment_id',
            ],
            $model->attributes()
        );
    }

    public function testGetModification()
    {
        $model = new ModificationEquipment();
        self::assertInstanceOf(ModificationQuery::class, $model->getModification());
    }

    public function testGetEquipment()
    {
        $model = new ModificationEquipment();
        self::assertInstanceOf(EquipmentQuery::class, $model->getEquipment());
    }
}
