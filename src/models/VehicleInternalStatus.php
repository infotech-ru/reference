<?php

namespace infotech\reference\models;

/**
 * Class VehicleInternalStatus
 * @package infotech\reference\models
 * @property integer $id
 * @property string $name
 */
class VehicleInternalStatus extends ActiveRecord
{
    public const  FREE = 1;
    public const  DELIVERY = 2;
    public const  RESERVE = 3;
    public const  CONTRACT = 4;
    public const  TRANSFERRED = 5;
    public const  DELETED = 6;
    public const  PREPARATION = 7;
    public const  TRANSIT = 8;
    public const  WORKSHEET = 9;

    public static function tableName(): string
    {
        return 'vehicle_internal_status';
    }

    public static function find()
    {
        return new VehicleInternalStatusQuery(static::class);
    }
}
