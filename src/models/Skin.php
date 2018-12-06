<?php

namespace infotech\reference\models;

/**
 * Class Skin
 * @package infotech\reference\models
 * @property integer $id
 * @property integer $model_id
 * @property integer $common_skin_id
 * @property string $code
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property-read  SkinSerie[] $skinSeries
 * @property-read  Serie[] $series
 */
class Skin extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'eqt_skin';
    }

    public static function getList($modelId): array
    {
        return static::find()->model($modelId)->select('name, id')->indexBy('id')->column();
    }

    public static function find()
    {
        return new SkinQuery(static::class);
    }

    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

    public function getCommonSkin()
    {
        return $this->hasOne(Skin::class, ['id' => 'common_skin_id']);
    }

    public function getSkinSeries()
    {
        return $this->hasMany(SkinSerie::class, ['skin_id' => 'id']);
    }

    public function getSeries()
    {
        return $this->hasMany(Serie::class, ['is_car_serie' => 'serie_id'])->via('skinSeries');
    }
}