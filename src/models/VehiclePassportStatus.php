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
    const NOT_AVAILABLE = 0;
    const PAID = 1;
    const AVAILABLE = 2;
    const AVAILABLE_IN_BANK = 3;
    const ORDERED = 4;
    const SENT_TO_DEALER = 5;

    public static function tableName(): string
    {
        return 'vehicle_passport_status';
    }

    public static function find()
    {
        return new VehiclePassportStatusQuery(get_called_class());
    }
}