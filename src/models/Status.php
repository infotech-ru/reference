<?php

namespace infotech\reference\models;

/**
 * Class Status
 * @package infotech\reference\models
 * @property string $status_code
 * @property integer $brand_id
 * @property integer $status_ord
 * @property string $status_name
 */
class Status extends ActiveRecord
{
    const SUBARU_STATUS_DEALER_IN_WAY = 'ДИЛЕР_ПУТЬ';

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