<?php

namespace infotech\reference\models;

/**
 * Class ModelAlias
 * @package infotech\reference\models
 * @property integer $id
 * @property string $name
 * @property integer $brand_id
 * @property integer $model_id
 * @property integer $generation_id
 * @property integer $serie_id
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $classification
 * @property integer $is_new
 * @property-read Brand $brand
 * @property-read Model $model
 * @property-read Generation $generation
 * @property-read Serie $serie
 */
class ModelAlias extends ActiveRecord
{
    const STATUS_ACTIVE = 0;
    const STATUS_DELETED = 1;

    const CLASS_A = 1;
    const CLASS_B = 2;
    const CLASS_C = 3;
    const CLASS_D = 4;
    const CLASS_F = 5;
    const CLASS_S = 6;
    const CLASS_J = 7;
    const CLASS_M = 8;

    public static function tableName(): string
    {
        return 'model_alias';
    }

    public static function getList($brandId): array
    {
        return static::find()->brand($brandId)->status(self::STATUS_ACTIVE)->select('name, id')->indexBy('id')->column(
        );
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
}