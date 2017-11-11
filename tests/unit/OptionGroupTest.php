<?php

namespace infotech\reference\tests\unit;


use infotech\reference\BrandQuery;
use infotech\reference\OptionGroup;
use infotech\reference\OptionGroupQuery;
use PHPUnit\Framework\TestCase;

class OptionGroupTest extends TestCase
{
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
}