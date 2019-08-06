<?php

namespace infotech\reference\tests\unit\models;

use app\fixtures\VehicleOptionGroupFixture;
use app\fixtures\VehicleOptionTypeFixture;
use infotech\reference\models\VehicleOptionGroup;
use infotech\reference\models\VehicleOptionGroupQuery;
use infotech\reference\models\VehicleOptionType;
use infotech\reference\models\VehicleOptionTypeQuery;
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
        $this->assertNotNull(new VehicleOptionType());
    }

    public function testTableName()
    {
        $this->assertEquals('vehicle_option_type', VehicleOptionType::tableName());
    }

    public function testPrimaryKey()
    {
        $this->assertEquals(['id'], VehicleOptionType::primaryKey());
    }

    public function testFind()
    {
        $this->assertInstanceOf(VehicleOptionTypeQuery::class, VehicleOptionType::find());
    }

    public function testAttributes()
    {
        $model = new VehicleOptionType();
        $this->assertEquals(
            [
                'id',
                'group_id',
                'name',
                'values_json',
            ],
            $model->attributes()
        );
    }

    public function testGetGroup()
    {
        $model = new VehicleOptionType();
        $this->assertInstanceOf(VehicleOptionGroupQuery::class, $model->getGroup());
    }

    public function testGroupIdIsRequired()
    {
        $model = new VehicleOptionType();
        $this->assertFalse($model->validate(['group_id']));
        $group = $this->getFixture('group')->getModel(1);
        $this->assertInstanceOf(VehicleOptionGroup::class, $group);
        $model->group_id = $group->id;
        $this->assertTrue($model->validate(['group_id']));
    }

    public function testValueAfterFind()
    {
        $model = VehicleOptionType::findOne(['id' => 1]);
        $this->assertInstanceOf(VehicleOptionType::class, $model);
        $this->assertEquals([['id' => 1], ['name' => 'value']], $model->values);
    }

    public function testValueBeforeSave()
    {
        $model = VehicleOptionType::findOne(['id' => 1]);
        $model->values = [2 => 'Value'];
        $this->assertTrue($model->beforeSave(false));
        $this->assertEquals('{"2":"Value"}', $model->values_json);
    }
}