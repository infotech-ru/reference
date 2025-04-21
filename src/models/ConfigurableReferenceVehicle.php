<?php

namespace infotech\reference\models;

/**
 * Class ConfigurableReferenceVehicle
 * @package infotech\reference\models
 * @property integer $id
 * @property integer $modelId
 * @property integer $brandId
 * @property string $productionYear
 * @property integer $transmissionType
 * @property integer $engineType
 * @property integer $regionId
 * @property integer $generationId
 * @property boolean $cache
 * @property integer $weight
 * @property string $paramId
 * @property string $paramValue
 */
class ConfigurableReferenceVehicle extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'configurable_reference_vehicle';
    }

    public static function find()
    {
        return new ConfigurableReferenceVehicleQuery(static::class);
    }
}
