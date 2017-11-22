<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\Source;
use infotech\reference\models\SourceQuery;
use PHPUnit\Framework\TestCase;

class SourceTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new Source());
    }

    public function testTableName()
    {
        $this->assertEquals('sources', Source::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(SourceQuery::class, Source::find());
    }

    public function testGetParent()
    {
        $model = new Source();
        $this->assertInstanceOf(SourceQuery::class, $model->getParent());
    }

    public function testAttributes()
    {
        $model = new Source();
        $this->assertEquals(
            [
                'id',
                'name',
                'parent_id',
            ],
            $model->attributes()
        );
    }

    public function testGetList()
    {
        $this->assertEquals([
            '1' => '1',
            '2' => '- 2',
            '3' => '-- 3',
            '4' => '4',
            '5' => '- 5',
        ], Source::getList());
    }
}