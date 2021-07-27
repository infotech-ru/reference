<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\BrandQuery;
use infotech\reference\models\OptionGroup;
use infotech\reference\models\OptionGroupQuery;
use infotech\reference\tests\fixtures\OptionGroupFixture;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class OptionGroupTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            OptionGroupFixture::class,
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
        self::assertNotNull(new OptionGroup());
    }

    public function testTableName()
    {
        self::assertEquals('eqt_option_group', OptionGroup::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(OptionGroupQuery::class, OptionGroup::find());
    }

    public function testGetBrand()
    {
        $model = new OptionGroup();
        self::assertInstanceOf(BrandQuery::class, $model->getBrand());
    }

    public function testAttributes()
    {
        $model = new OptionGroup();
        self::assertEquals(
            [
                'id',
                'brand_id',
                'name',
                'created_at',
                'updated_at',
                'ord',
            ],
            $model->attributes()
        );
    }

    public function testGetList()
    {
        self::assertEquals(['1' => '1'], OptionGroup::getList(1));
        self::assertEquals([], OptionGroup::getList(2));
    }
}
