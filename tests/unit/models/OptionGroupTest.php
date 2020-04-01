<?php

namespace infotech\reference\tests\unit\models;


use app\fixtures\OptionGroupFixture;
use infotech\reference\models\BrandQuery;
use infotech\reference\models\OptionGroup;
use infotech\reference\models\OptionGroupQuery;
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
        $this->assertNotNull(new OptionGroup());
    }

    public function testTableName()
    {
        $this->assertEquals('eqt_option_group', OptionGroup::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(OptionGroupQuery::class, OptionGroup::find());
    }

    public function testGetBrand()
    {
        $model = new OptionGroup();
        $this->assertInstanceOf(BrandQuery::class, $model->getBrand());
    }

    public function testAttributes()
    {
        $model = new OptionGroup();
        $this->assertEquals(
            [
                'id',
                'brand_id',
                'name',
                'created_at',
                'updated_at',
            ],
            $model->attributes()
        );
    }

    public function testGetList()
    {
        $this->assertEquals(['1' => '1'], OptionGroup::getList(1));
        $this->assertEquals([], OptionGroup::getList(2));
    }
}