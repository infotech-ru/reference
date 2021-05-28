<?php

namespace infotech\reference\models;

/**
 * Class VehicleVerificationProgram
 * @package infotech\reference\models
 *
 * @property integer $id
 * @property integer $brand_id
 * @property string $name
 * @property string $description
 * @property string $photo
 */
class VehicleVerificationProgram extends ActiveRecord
{
    public const  BASE_CATALOG_NAME = 'vehicle-verification-program';

    private static $_basePhotoUrl = 'http://195004.selcdn.ru/ref/';

    public static function tableName(): string
    {
        return 'vehicle_verification_program';
    }

    public static function find()
    {
        return new VehicleVerificationProgramQuery(static::class);
    }

    public function getPhotoUrl()
    {
        if ($this->photo) {
            return self::$_basePhotoUrl . $this->photo;
        }

        return null;
    }

    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }
}
