<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\Brand;
use infotech\reference\models\BrandLogoQuery;
use infotech\reference\models\BrandQuery;
use infotech\reference\models\ModelQuery;
use infotech\reference\models\NewsBrandQuery;
use infotech\reference\models\NewsQuery;
use infotech\reference\models\OptionGroupQuery;
use infotech\reference\models\OrderTypeQuery;
use infotech\reference\tests\fixtures\BrandFixture;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class BrandTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            BrandFixture::class,
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
        self::assertNotNull(new Brand());
    }

    public function testTableName()
    {
        self::assertEquals('brands', Brand::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(BrandQuery::class, Brand::find());
    }

    public function testGetModels()
    {
        $model = new Brand();
        self::assertInstanceOf(ModelQuery::class, $model->getModels());
    }

    public function testGetBrandLogo()
    {
        $model = new Brand();
        self::assertInstanceOf(BrandLogoQuery::class, $model->getBrandLogo());
    }

    public function testGetOptionGroups()
    {
        $model = new Brand();
        self::assertInstanceOf(OptionGroupQuery::class, $model->getOptionGroups());
    }

    public function testAttributes()
    {
        $model = new Brand();
        self::assertEquals(
            [
                'id',
                'name',
                'name_eng',
                'name_market',
                'logo',
                'importer_db_name',
                'host',
                'token',
                'ecm_id',
                'is_supported',
                'origin_id',
                'is_vin_manufacturer',
                'color',
                'is_recent',
                'vehicle_type',
            ],
            $model->attributes()
        );
    }

    public function testGetList()
    {
        self::assertEquals(
            [
                '1' => 'Opel',
                '2' => 'Chevrolet',
                '3' => 'Cadillac',
            ],
            Brand::getList()
        );
    }

    public function testSubaruId()
    {
        self::assertEquals(111, Brand::SUBARU_ID);
    }

    public function testGazId()
    {
        self::assertEquals(127, Brand::GAZ_ID);
    }

    public function testUazId()
    {
        self::assertEquals(134, Brand::UAZ_ID);
    }

    public function testHavalId()
    {
        self::assertEquals(152, Brand::HAVAL_ID);
    }

    public function testTankId()
    {
        self::assertEquals(2628, Brand::TANK_ID);
    }

    public function testNissanId()
    {
        self::assertEquals(88, Brand::NISSAN_ID);
    }

    public function testCadillacId()
    {
        self::assertEquals(3, Brand::CADILLAC_ID);
    }

    public function testChevroletId()
    {
        self::assertEquals(2, Brand::CHEVROLET_ID);
    }

    public function testSmartId()
    {
        self::assertEquals(108, Brand::SMART_ID);
    }

    public function testMercedesId()
    {
        self::assertEquals(80, Brand::MERCEDES_ID);
    }

    public function testKiaId()
    {
        self::assertEquals(8, Brand::KIA_ID);
    }

    public function testFordId()
    {
        self::assertEquals(6, Brand::FORD_ID);
    }

    public function testInfinitiId()
    {
        self::assertEquals(57, Brand::INFINITI_ID);
    }

    public function testGeelyId()
    {
        self::assertEquals(46, Brand::GEELY_ID);
    }

    public function testOpelId()
    {
        self::assertEquals(1, Brand::OPEL_ID);
    }

    public function testMitsubishiId()
    {
        self::assertEquals(7, Brand::MITSUBISHI_ID);
    }

    public function testPeugeotId()
    {
        self::assertEquals(4, Brand::PEUGEOT_ID);
    }

    public function testCitroenId()
    {
        self::assertEquals(5, Brand::CITROEN_ID);
    }

    public function testGetOrderTypes()
    {
        $model = new Brand();
        self::assertInstanceOf(OrderTypeQuery::class, $model->getOrderTypes());
    }

    public function testGetNews()
    {
        $model = new Brand();
        self::assertInstanceOf(NewsQuery::class, $model->getNews());
    }

    public function testGetNewsBrands()
    {
        $model = new Brand();
        self::assertInstanceOf(NewsBrandQuery::class, $model->getNewsBrands());
    }

    public function testVehicleTypeMixed()
    {
        self::assertEquals(1, Brand::VEHICLE_TYPE_MIXED);
    }

    public function testVehicleTypePassenger()
    {
        self::assertEquals(2, Brand::VEHICLE_TYPE_PASSENGER);
    }

    public function testVehicleTypeCargo()
    {
        self::assertEquals(3, Brand::VEHICLE_TYPE_CARGO);
    }

    public function testVehicleTypeMoto()
    {
        self::assertEquals(4, Brand::VEHICLE_TYPE_MOTO);
    }

    public function testSwmId()
    {
        self::assertEquals(2681, Brand::SWM_ID);
    }
}
