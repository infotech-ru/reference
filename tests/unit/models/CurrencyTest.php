<?php

namespace infotech\reference\tests\unit\models;

use app\fixtures\CurrencyFixture;
use infotech\reference\models\Currency;
use infotech\reference\models\CurrencyQuery;
use PHPUnit\Framework\TestCase;
use yii\test\FixtureTrait;

class CurrencyTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            CurrencyFixture::class,
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
        $this->assertNotNull(new Currency());
    }

    public function testTableName()
    {
        $this->assertEquals('currency', Currency::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(CurrencyQuery::class, Currency::find());
    }

    public function testAttributes()
    {
        $model = new Currency();
        $this->assertEquals(
            [
                'number_code',
                'string_code',
                'name',
                'short_name',
            ],
            $model->attributes()
        );
    }

    public function testGetList()
    {
        $this->assertEquals(
            [
                'AMD' => 'Армянский драм',
                'KZT' => 'Тенге',
                'RUB' => 'Российский рубль',
                'BYN' => 'Белорусский рубль',
                'UAH' => 'Гривна',
            ],
            Currency::getList()
        );
    }
}
