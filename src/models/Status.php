<?php

namespace infotech\reference\models;

/**
 * Class Status
 * @package infotech\reference\models
 */
class Status extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'statuses';
    }

    public static function find()
    {
        return new StatusQuery(get_called_class());
    }

    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }
}