<?php

namespace infotech\reference\models;

/**
 * Class WarehouseVehiclePtsStatus
 * @package infotech\reference\models
 * @property integer $id
 * @property string  $name
 */
class WarehouseVehiclePtsStatus extends ActiveRecord
{
    const NOT_AVAILABLE = 0;
    const PAID = 1;
    const AVAILABLE = 2;
    const AVAILABLE_IN_BANK = 3;
    const ORDERED = 4;
    const SENT_TO_DEALER = 5;

    public static function tableName(): string
    {
        return 'warehouse_vehicle_pts_status';
    }

    public static function find()
    {
        return new StatusQuery(get_called_class());
    }
}