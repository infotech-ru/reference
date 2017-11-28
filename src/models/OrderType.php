<?php

namespace infotech\reference\models;

/**
 * Class OrderType
 * @package infotech\reference\models
 * @property string $code
 * @property integer $brand_id
 * @property string $name
 * @property integer $ord
 */
class OrderType extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'order_types';
    }

    public static function find()
    {
        return new OrderTypeQuery(get_called_class());
    }

    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }
}