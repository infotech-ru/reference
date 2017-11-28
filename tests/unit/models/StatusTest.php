<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\BrandQuery;
use infotech\reference\models\Status;
use infotech\reference\models\StatusQuery;
use PHPUnit\Framework\TestCase;

class StatusTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertNotNull(new Status());
    }

    public function testTableName()
    {
        $this->assertEquals('statuses', Status::tableName());
    }

    public function testPrimaryKey()
    {
        $this->assertEquals(['status_code', 'brand_id'], Status::primaryKey());
    }

    public function testFind()
    {
        $this->assertInstanceOf(StatusQuery::class, Status::find());
    }

    public function testGetBrand()
    {
        $model = new Status();
        $this->assertInstanceOf(BrandQuery::class, $model->getBrand());
    }

    public function testAttributes()
    {
        $model = new Status();
        $this->assertEquals(
            [
                'status_code',
                'brand_id',
                'status_ord',
                'status_name',
            ],
            $model->attributes()
        );
    }

    public function testSUBARU_STATUS_DEALER_IN_WAY()
    {
        $this->assertEquals('ДИЛЕР_ПУТЬ', Status::SUBARU_STATUS_DEALER_IN_WAY);
    }
}