<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\FederalDistrict;
use infotech\reference\models\FederalDistrictQuery;
use infotech\reference\models\RegionQuery;
use PHPUnit\Framework\TestCase;

class FederalDistrictTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new FederalDistrict());
    }

    public function testTableName()
    {
        $this->assertEquals('federal_districts', FederalDistrict::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(FederalDistrictQuery::class, FederalDistrict::find());
    }

    public function testAttributes()
    {
        $model = new FederalDistrict();
        $this->assertEquals(
            [
                'id',
                'name',
            ],
            $model->attributes()
        );
    }

    public function testGetRegions()
    {
        $model = new FederalDistrict();
        $this->assertInstanceOf(RegionQuery::class, $model->getRegions());
    }
}