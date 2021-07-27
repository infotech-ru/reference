<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ModelOption;
use infotech\reference\models\ModelOptionQuery;
use infotech\reference\models\ModelOptionTagQuery;
use infotech\reference\models\ModelQuery;
use infotech\reference\models\OptionGroupQuery;
use PHPUnit\Framework\TestCase;

class ModelOptionTest extends TestCase
{
    public function testConstructor()
    {
        self::assertNotNull(new ModelOption());
    }

    public function testTableName()
    {
        self::assertEquals('eqt_model_option', ModelOption::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(ModelOptionQuery::class, ModelOption::find());
    }

    public function testGetModel()
    {
        $model = new ModelOption();
        self::assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testGetOptionGroup()
    {
        $model = new ModelOption();
        self::assertInstanceOf(OptionGroupQuery::class, $model->getOptionGroup());
    }

    public function testGetModelOptionTag()
    {
        $model = new ModelOption();
        self::assertInstanceOf(ModelOptionTagQuery::class, $model->getModelOptionTag());
    }

    public function testAttributes()
    {
        $model = new ModelOption();
        self::assertEquals(
            [
                'id',
                'model_id',
                'option_group_id',
                'model_option_tag_id',
                'name',
                'created_at',
                'updated_at',
                'incompatible_options_codes',
                'ord',
            ],
            $model->attributes()
        );
    }
}
