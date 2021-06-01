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
        self::assertNotNull(new Status());
    }

    public function testTableName()
    {
        self::assertEquals('statuses', Status::tableName());
    }

    public function testPrimaryKey()
    {
        self::assertEquals(['status_code', 'brand_id'], Status::primaryKey());
    }

    public function testFind()
    {
        self::assertInstanceOf(StatusQuery::class, Status::find());
    }

    public function testGetBrand()
    {
        $model = new Status();
        self::assertInstanceOf(BrandQuery::class, $model->getBrand());
    }

    public function testAttributes()
    {
        $model = new Status();
        self::assertEquals(
            [
                'status_code',
                'brand_id',
                'status_ord',
                'status_name',
            ],
            $model->attributes()
        );
    }

    public function testSubaruStatusDealerInWay()
    {
        self::assertEquals('ДИЛЕР_ПУТЬ', Status::SUBARU_STATUS_DEALER_IN_WAY);
    }
}
