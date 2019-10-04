<?php

namespace infotech\reference\models;

use yii\helpers\ArrayHelper;

/**
 * Class Currency
 * @package app\models
 *
 * @property string $number_code
 * @property string $string_code
 * @property string $name
 * @property string $short_name
 */
class Currency extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'currency';
    }

    public static function find()
    {
        return new CurrencyQuery(static::class);
    }

    /**
     * @return array
     */
    public static function getList()
    {
        return ArrayHelper::map(static::find()->all(), 'string_code', 'name');
    }
}
