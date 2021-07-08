<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\Currency;
use infotech\reference\models\CurrencyQuery;
use infotech\reference\tests\fixtures\CurrencyFixture;
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
        self::assertNotNull(new Currency());
    }

    public function testTableName()
    {
        self::assertEquals('currency', Currency::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(CurrencyQuery::class, Currency::find());
    }

    public function testAttributes()
    {
        $model = new Currency();
        self::assertEquals(
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
        self::assertEquals(
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
