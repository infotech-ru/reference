<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\EquipmentQuery;
use infotech\reference\models\ModelOptionQuery;
use infotech\reference\models\Option;
use infotech\reference\models\OptionGroupQuery;
use infotech\reference\models\OptionQuery;
use PHPUnit\Framework\TestCase;

class OptionTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new Option());
    }

    public function testTableName()
    {
        $this->assertEquals('eqt_option', Option::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(OptionQuery::class, Option::find());
    }

    public function testGetEquipment()
    {
        $model = new Option();
        $this->assertInstanceOf(EquipmentQuery::class, $model->getEquipment());
    }

    public function testGetModelOption()
    {
        $model = new Option();
        $this->assertInstanceOf(ModelOptionQuery::class, $model->getModelOption());
    }

    public function testGetOptionGroup()
    {
        $model = new Option();
        $this->assertInstanceOf(OptionGroupQuery::class, $model->getOptionGroup());
    }

    public function testAttributes()
    {
        $model = new Option();
        $this->assertEquals(
            [
                'id',
                'equipment_id',
                'model_option_id',
                'name',
                'created_at',
                'updated_at',
                'option_group_id',
            ],
            $model->attributes()
        );
    }
}
