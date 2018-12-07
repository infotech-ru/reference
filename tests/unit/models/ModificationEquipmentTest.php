<?php

namespace infotech\reference\tests\unit\models;


use app\fixtures\ModificationEquipmentFixture;
use infotech\reference\models\EquipmentQuery;
use infotech\reference\models\ModificationEquipment;
use infotech\reference\models\ModificationEquipmentQuery;
use infotech\reference\models\ModificationQuery;
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
        $this->assertNotNull(new ModificationEquipment());
    }

    public function testTableName()
    {
        $this->assertEquals('modification_equipment', ModificationEquipment::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(ModificationEquipmentQuery::class, ModificationEquipment::find());
    }

    public function testAttributes()
    {
        $model = new ModificationEquipment();
        $this->assertEquals(
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
        $this->assertInstanceOf(ModificationQuery::class, $model->getModification());
    }

    public function testGetEquipment()
    {
        $model = new ModificationEquipment();
        $this->assertInstanceOf(EquipmentQuery::class, $model->getEquipment());
    }
}