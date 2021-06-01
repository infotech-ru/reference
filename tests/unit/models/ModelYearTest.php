<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\EquipmentQuery;
use infotech\reference\models\ModelQuery;
use infotech\reference\models\ModelYear;
use infotech\reference\models\ModelYearEquipmentQuery;
use infotech\reference\models\ModelYearQuery;
use infotech\reference\tests\fixtures\ModelYearFixture;
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
        self::assertNotNull(new ModelYear());
    }

    public function testTableName()
    {
        self::assertEquals('model_year', ModelYear::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(ModelYearQuery::class, ModelYear::find());
    }

    public function testGetModel()
    {
        $model = new ModelYear();
        self::assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testAttributes()
    {
        $model = new ModelYear();
        self::assertEquals(
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
        self::assertEquals(['1' => '1'], ModelYear::getList(1, true));
        self::assertEquals(['1' => '1', '2' => '2'], ModelYear::getList(1, false));
    }

    public function testGetModelYearEquipments()
    {
        $model = new ModelYear();
        self::assertInstanceOf(ModelYearEquipmentQuery::class, $model->getModelYearEquipments());
    }

    public function testGetEquipments()
    {
        $model = new ModelYear();
        self::assertInstanceOf(EquipmentQuery::class, $model->getEquipments());
    }
}
