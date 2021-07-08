<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ModelOptionTag;
use infotech\reference\models\ModelOptionTagQuery;
use infotech\reference\models\ModelQuery;
use infotech\reference\tests\fixtures\ModelOptionTagFixture;
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
        self::assertNotNull(new ModelOptionTag());
    }

    public function testTableName()
    {
        self::assertEquals('eqt_model_option_tag', ModelOptionTag::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(ModelOptionTagQuery::class, ModelOptionTag::find());
    }

    public function testGetModel()
    {
        $model = new ModelOptionTag();
        self::assertInstanceOf(ModelQuery::class, $model->getModel());
    }

    public function testAttributes()
    {
        $model = new ModelOptionTag();
        self::assertEquals(
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
        self::assertEquals(['1' => '1'], ModelOptionTag::getList(1));
    }
}
