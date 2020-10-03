<?php

namespace infotech\reference\tests\unit\models;

use app\fixtures\ModelYearFixture;
use infotech\reference\models\EquipmentQuery;
use infotech\reference\models\ModelQuery;
use infotech\reference\models\ModelYear;
use infotech\reference\models\ModelYearEquipmentQuery;
use infotech\reference\models\ModelYearQuery;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class ModelYearTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            ModelYearFixture::class,
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
        $this->assertNotNull(new ModelYear());
    }

    public function testTableName()
    {
        $this->assertEquals('model_year', ModelYear::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(ModelYearQuery::class, ModelYear::find());
    }

    public function testGetModel()
    {
        $model = new ModelYear();
        $this->assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testAttributes()
    {
        $model = new ModelYear();
        $this->assertEquals(
            [
                'id',
                'model_id',
                'year',
                'is_recent',
                'is_default',
                'code',
            ],
            $model->attributes()
        );
    }

    public function testGetList()
    {
        $this->assertEquals(['1' => '1'], ModelYear::getList(1, true));
        $this->assertEquals(['1' => '1', '2' => '2'], ModelYear::getList(1, false));
    }

    public function testGetModelYearEquipments()
    {
        $model = new ModelYear();
        $this->assertInstanceOf(ModelYearEquipmentQuery::class, $model->getModelYearEquipments());
    }

    public function testGetEquipments()
    {
        $model = new ModelYear();
        $this->assertInstanceOf(EquipmentQuery::class, $model->getEquipments());
    }
}
