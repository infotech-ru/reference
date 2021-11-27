<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

/**
 * Class ModelAlias
 * @package infotech\reference\models
 * @property integer $id
 * @property string $name
 * @property integer $brand_id
 * @property integer $model_id
 * @property integer $generation_id
 * @property integer $serie_id
 * @property integer $modification_id
 * @property integer $status
 * @property string $code
 * @property string $created_at
 * @property string $updated_at
 * @property integer $classification
 * @property integer $is_new
 * @property string $model_code
 * @property string $body_code
 * @property integer $order
 * @property-read Brand $brand
 * @property-read Model $model
 * @property-read Generation $generation
 * @property-read Modification $modification
 * @property-read Serie $serie
 */
class ModelAlias extends ActiveRecord
{
    public const  STATUS_ACTIVE = 0;
    public const  STATUS_DELETED = 1;
    public const  CLASS_A = 1;
    public const  CLASS_B = 2;
    public const  CLASS_C = 3;
    public const  CLASS_D = 4;
    public const  CLASS_F = 5;
    public const  CLASS_S = 6;
    public const  CLASS_J = 7;
    public const  CLASS_M = 8;
    public const  CLASS_X = 9;
    public const  CLASS_COMMERCIAL = 10;

    public static function tableName(): string
    {
        return 'model_alias';
    }

    /**
     * @param $brandId
     * @return array
     * @throws InvalidConfigException
     */
    public static function getList($brandId): array
    {
        return static::find()
            ->brand($brandId)
            ->status(self::STATUS_ACTIVE)
            ->select('name, id')
            ->indexBy('id')
            ->column();
    }

    public static function find()
    {
        return new ModelAliasQuery(static::class);
    }

    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }

    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

    public function getGeneration()
    {
        return $this->hasOne(Generation::class, ['id_car_generation' => 'generation_id']);
    }

    public function getSerie()
    {
        return $this->hasOne(Serie::class, ['id_car_serie' => 'serie_id']);
    }

    public function getModification()
    {
        return $this->hasOne(Modification::class, ['id_car_modification' => 'modification_id']);
    }
}
