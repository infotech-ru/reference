<?php

namespace infotech\reference\models;

/**
 * Class VehicleOptionGroup
 * @package infotech\reference\models
 *
 * @property integer             $id
 * @property string              $name
 *
 * @property VehicleOptionType[] $types
 */
class VehicleOptionGroup extends ActiveRecord
{

    public static function tableName(): string
    {
        return 'vehicle_option_group';
    }

    public static function find()
    {
        return new VehicleOptionGroupQuery(static::class);
    }

    public function getTypes()
    {
        return $this->hasMany(VehicleOptionType::class, ['group_id' => 'id']);
    }
}