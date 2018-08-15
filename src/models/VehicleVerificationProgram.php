<?php

namespace infotech\reference\models;

/**
 * Class VehicleVerificationProgram
 * @package infotech\reference\models
 *
 * @property integer $brand_id
 * @property string  $name
 * @property string  $description
 * @property string  $photo
 */
class VehicleVerificationProgram extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'vehicle_verification_program';
    }

    public static function find()
    {
        return new VehicleVerificationProgramQuery(static::class);
    }
}