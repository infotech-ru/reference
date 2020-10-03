<?php

namespace infotech\reference\models;

/**
 * Class VehiclePassportStatus
 * @package infotech\reference\models
 * @property integer $id
 * @property string  $name
 */
class VehiclePassportStatus extends ActiveRecord
{
    public const  NOT_AVAILABLE = 0;
    public const  PAID = 1;
    public const  AVAILABLE = 2;
    public const  AVAILABLE_IN_BANK = 3;
    public const  ORDERED = 4;
    public const  SENT_TO_DEALER = 5;

    public static function tableName(): string
    {
        return 'vehicle_passport_status';
    }

    public static function find()
    {
        return new VehiclePassportStatusQuery(static::class);
    }
}
