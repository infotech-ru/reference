<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\VehicleOptionGroup;
use infotech\reference\models\VehicleOptionGroupQuery;
use infotech\reference\models\VehicleOptionType;
use infotech\reference\models\VehicleOptionTypeQuery;
use infotech\reference\tests\fixtures\VehicleOptionGroupFixture;
use infotech\reference\tests\fixtures\VehicleOptionTypeFixture;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class VehicleOptionTypeTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            VehicleOptionTypeFixture::class,
            'group' => VehicleOptionGroupFixture::class,
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
        self::assertNotNull(new VehicleOptionType());
    }

    public function testTableName()
    {
        self::assertEquals('vehicle_option_type', VehicleOptionType::tableName());
    }

    public function testPrimaryKey()
    {
        self::assertEquals(['id'], VehicleOptionType::primaryKey());
    }

    public function testFind()
    {
        self::assertInstanceOf(VehicleOptionTypeQuery::class, VehicleOptionType::find());
    }

    public function testAttributes()
    {
        $model = new VehicleOptionType();
        self::assertEquals(
            [
                'id',
                'group_id',
                'name',
                'values_json',
                'has_text_input',
            ],
            $model->attributes()
        );
    }

    public function testGetGroup()
    {
        $model = new VehicleOptionType();
        self::assertInstanceOf(VehicleOptionGroupQuery::class, $model->getGroup());
    }

    public function testGroupIdIsRequired()
    {
        $model = new VehicleOptionType();
        self::assertFalse($model->validate(['group_id']));
        $group = $this->getFixture('group')->getModel(1);
        self::assertInstanceOf(VehicleOptionGroup::class, $group);
        $model->group_id = $group->id;
        self::assertTrue($model->validate(['group_id']));
    }

    public function testValueAfterFind()
    {
        $model = VehicleOptionType::findOne(['id' => 1]);
        self::assertInstanceOf(VehicleOptionType::class, $model);
        self::assertEquals([['id' => 1], ['name' => 'value']], $model->values);
    }

    public function testValueBeforeSave()
    {
        $model = VehicleOptionType::findOne(['id' => 1]);
        $model->values = [2 => 'Value'];
        self::assertTrue($model->beforeSave(false));
        self::assertEquals('{"2":"Value"}', $model->values_json);
    }
}
