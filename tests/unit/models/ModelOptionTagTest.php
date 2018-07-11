<?php

namespace infotech\reference\tests\unit\models;


use app\fixtures\ModelOptionTagFixture;
use infotech\reference\models\ModelOptionTag;
use infotech\reference\models\ModelOptionTagQuery;
use infotech\reference\models\ModelQuery;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class ModelOptionTagTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            ModelOptionTagFixture::class,
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
        $this->assertNotNull(new ModelOptionTag());
    }

    public function testTableName()
    {
        $this->assertEquals('eqt_model_option_tag', ModelOptionTag::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(ModelOptionTagQuery::class, ModelOptionTag::find());
    }

    public function testGetModel()
    {
        $model = new ModelOptionTag();
        $this->assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testAttributes()
    {
        $model = new ModelOptionTag();
        $this->assertEquals(
            [
                'id',
                'model_id',
                'name',
            ],
            $model->attributes()
        );
    }

    public function testGetList()
    {
        $this->assertEquals(['1' => '1'], ModelOptionTag::getList(1));
    }
}