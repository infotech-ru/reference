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

    public function testLadaId()
    {
        self::assertEquals(125, Brand::LADA_ID);
    }

    public function testHondaMotoId()
    {
        self::assertEquals(1215, Brand::HONDA_MOTO_ID);
    }

    public function testHondaId()
    {
        self::assertEquals(52, Brand::HONDA_ID);
    }

    public function testAcuraId()
    {
        self::assertEquals(13, Brand::ACURA_ID);
    }

    public function testEvoluteId()
    {
        self::assertEquals(2661, Brand::EVOLUTE_ID);
    }

    public function testVoyahId()
    {
        self::assertEquals(2664, Brand::VOYAH_ID);
    }

    public function testChanganId()
    {
        self::assertEquals(140, Brand::CHANGAN_ID);
    }

    public function testGazNewId()
    {
        self::assertEquals(1367, Brand::GAZ_NEW_ID);
    }

    public function testFawId()
    {
        self::assertEquals(43, Brand::FAW_ID);
    }

    public function testToyotaId()
    {
        self::assertEquals(11, Brand::TOYOTA_ID);
    }

    public function testVolkswagenId()
    {
        self::assertEquals(9, Brand::VOLKSWAGEN_ID);
    }

    public function testHyundaiId()
    {
        self::assertEquals(56, Brand::HYUNDAI_ID);
    }

    public function testAudiId()
    {
        self::assertEquals(19, Brand::AUDI_ID);
    }

    public function testPorscheId()
    {
        self::assertEquals(94, Brand::PORSCHE_ID);
    }

    public function testExeedId()
    {
        self::assertEquals(2082, Brand::EXEED_ID);
    }

    public function testSaId()
    {
        self::assertEquals(2634, Brand::SA_ID);
    }

    public function testAbarthId()
    {
        self::assertEquals(1365, Brand::ABARTH_ID);
    }

    public function testLanciaId()
    {
        self::assertEquals(67, Brand::LANCIA_ID);
    }

    public function testFiatId()
    {
        self::assertEquals(45, Brand::FIAT_ID);
    }

    public function testJeepId()
    {
        self::assertEquals(63, Brand::JEEP_ID);
    }

    public function testDodge()
    {
        self::assertEquals(38, Brand::DODGE);
    }

    public function testChrysler()
    {
        self::assertEquals(31, Brand::CHRYSLER);
    }

    public function testAlfaRomeo()
    {
        self::assertEquals(14, Brand::ALFA_ROMEO);
    }

    public function testFiatProfessional()
    {
        self::assertEquals(2620, Brand::FIAT_PROFESSIONAL_ID);
    }
}
