<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\EquipmentQuery;
use infotech\reference\models\ModelYearEquipment;
use infotech\reference\models\ModelYearEquipmentQuery;
use infotech\reference\models\ModelYearQuery;
use infotech\reference\tests\fixtures\ModelYearEquipmentFixture;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class ModelYearEquipmentTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            ModelYearEquipmentFixture::class,
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
        $this->assertNotNull(new ModelYearEquipment());
    }

    public function testTableName()
    {
        $this->assertEquals('model_year_equipment', ModelYearEquipment::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(ModelYearEquipmentQuery::class, ModelYearEquipment::find());
    }

    public function testAttributes()
    {
        $model = new ModelYearEquipment();
        $this->assertEquals(
            [
                'model_year_id',
                'equipment_id',
            ],
            $model->attributes()
        );
    }

    public function testGetModelYear()
    {
        $model = new ModelYearEquipment();
        $this->assertInstanceOf(ModelYearQuery::class, $model->getModelYear());
    }

    public function testGetEquipment()
    {
        $model = new ModelYearEquipment();
        $this->assertInstanceOf(EquipmentQuery::class, $model->getEquipment());
    }
}
