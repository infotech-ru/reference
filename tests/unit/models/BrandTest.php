<?php

namespace infotech\reference\tests\unit\models;


use app\fixtures\BrandFixture;
use infotech\reference\models\Brand;
use infotech\reference\models\BrandLogoQuery;
use infotech\reference\models\BrandQuery;
use infotech\reference\models\ModelQuery;
use infotech\reference\models\NewsBrandQuery;
use infotech\reference\models\NewsQuery;
use infotech\reference\models\OptionGroupQuery;
use infotech\reference\models\OrderTypeQuery;
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

    public function setUp()
    {
        $this->loadFixtures();
    }

    public function tearDown()
    {
        $this->unloadFixtures();
    }

    public function testConstructor()
    {
        $this->assertNotNull(new Brand());
    }

    public function testTableName()
    {
        $this->assertEquals('brands', Brand::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(BrandQuery::class, Brand::find());
    }

    public function testGetModels()
    {
        $model = new Brand();
        $this->assertInstanceOf(ModelQuery::class, $model->getModels());
    }

    public function testGetBrandLogo()
    {
        $model = new Brand();
        $this->assertInstanceOf(BrandLogoQuery::class, $model->getBrandLogo());
    }

    public function testGetOptionGroups()
    {
        $model = new Brand();
        $this->assertInstanceOf(OptionGroupQuery::class, $model->getOptionGroups());
    }

    public function testAttributes()
    {
        $model = new Brand();
        $this->assertEquals(
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
                'is_vin_manufacturer'
            ],
            $model->attributes()
        );
    }

    public function testGetList()
    {
        $this->assertEquals([
            '1' => 'Opel',
            '2' => 'Chevrolet',
            '3' => 'Cadillac',
        ], Brand::getList());
    }

    public function testSubaruId()
    {
        $this->assertEquals(111, Brand::SUBARU_ID);
    }

    public function testGazId()
    {
        $this->assertEquals(127, Brand::GAZ_ID);
    }

    public function testUazId()
    {
        $this->assertEquals(134, Brand::UAZ_ID);
    }

    public function testCadillacId()
    {
        $this->assertEquals(3, Brand::CADILLAC_ID);
    }

    public function testChevroletId()
    {
        $this->assertEquals(2, Brand::CHEVROLET_ID);
    }

    public function testSmartId()
    {
        $this->assertEquals(108, Brand::SMART_ID);
    }

    public function testMercedesId()
    {
        $this->assertEquals(80, Brand::MERCEDES_ID);
    }

    public function testGetOrderTypes()
    {
        $model = new Brand();
        $this->assertInstanceOf(OrderTypeQuery::class, $model->getOrderTypes());
    }

    public function testGetNews()
    {
        $model = new Brand();
        $this->assertInstanceOf(NewsQuery::class, $model->getNews());
    }

    public function testGetNewsBrands()
    {
        $model = new Brand();
        $this->assertInstanceOf(NewsBrandQuery::class, $model->getNewsBrands());
    }

}