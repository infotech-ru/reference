<?php

namespace infotech\reference\models;

/**
 * Class Status
 * @package infotech\reference\models
 * @property string  $status_code
 * @property integer $brand_id
 * @property integer $status_ord
 * @property string  $status_name
 */
class Status extends ActiveRecord
{
    public const SUBARU_STATUS_DEALER_IN_WAY = 'ДИЛЕР_ПУТЬ';
    public const SUBARU_STATUS_DEALER = 'ДИЛЕР';

    public static function tableName(): string
    {
        return 'statuses';
    }

    public static function find()
    {
        return new StatusQuery(static::class);
    }

    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }

    public static function getSubaruDealerStatuses()
    {
        return [
            self::SUBARU_STATUS_DEALER,
            self::SUBARU_STATUS_DEALER_IN_WAY,
            'ДИЛЕР_ПУТЬ_М',
            'ДИЛЕР_ПУТЬ_Н',
            'ДИЛЕР_ПУТЬ_С',
            'ДИЛЕР_П_В',
            'ДИЛЕР_П_П',
            'ДИЛ_ПУТЬ_М',
            'ДИЛ_ПУТЬ_Н',
            'ДИЛ_ПУТЬ_С',
        ];
    }
}
