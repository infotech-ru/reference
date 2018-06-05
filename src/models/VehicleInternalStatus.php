<?php

namespace infotech\reference\models;

/**
 * Class VehicleInternalStatus
 * @package infotech\reference\models
 * @property integer $id
 * @property string  $name
 */
class VehicleInternalStatus extends ActiveRecord
{
    const FREE = 1;
    const DELIVERY = 2;
    const RESERVE = 3;
    const CONTRACT = 4;
    const TRANSFERRED = 5;
    const DELETED = 6;
    const PREPARATION = 7;

    public static function tableName(): string
    {
        return 'vehicle_internal_status';
    }

    public static function find()
    {
        return new VehicleInternalStatusQuery(get_called_class());
    }
}