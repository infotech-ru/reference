<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\ModelQuery;
use infotech\reference\models\Skin;
use infotech\reference\models\SkinQuery;
use PHPUnit\Framework\TestCase;

class SkinTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new Skin());
    }

    public function testTableName()
    {
        $this->assertEquals('eqt_skin', Skin::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(SkinQuery::class, Skin::find());
    }

    public function testAttributes()
    {
        $model = new Skin();
        $this->assertEquals(
            [
                'id',
                'model_id',
                'common_skin_id',
                'code',
                'name',
                'created_at',
                'updated_at',
            ],
            $model->attributes()
        );
    }

    public function testGetModel()
    {
        $model = new Skin();
        $this->assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testGetCommonSkin()
    {
        $model = new Skin();
        $this->assertInstanceOf(SkinQuery::class, $model->getCommonSkin());
    }

    public function testGetList()
    {
        $this->assertEquals(['1' => '1'], Skin::getList(1));
    }
}