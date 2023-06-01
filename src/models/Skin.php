<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

/**
 * Class Skin
 * @package infotech\reference\models
 * @property integer           $id
 * @property integer           $model_id
 * @property integer           $common_skin_id
 * @property string            $code
 * @property string            $name
 * @property string            $image_url
 * @property string            $created_at
 * @property string            $updated_at
 * @property-read  SkinSerie[] $skinSeries
 * @property-read  Serie[]     $series
 */
class Skin extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'eqt_skin';
    }

    /**
     * @param $modelId
     * @return array
     * @throws InvalidConfigException
     */
    public static function getList($modelId): array
    {
        return static::find()->model($modelId)->select('name, id')->indexBy('id')->column();
    }

    public static function find(): SkinQuery
    {
        return new SkinQuery(static::class);
    }

    public function getModel(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

    public function getCommonSkin(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Skin::class, ['id' => 'common_skin_id']);
    }

    public function getSkinSeries(): \yii\db\ActiveQuery
    {
        return $this->hasMany(SkinSerie::class, ['skin_id' => 'id']);
    }

    public function getSeries(): \yii\db\ActiveQuery
    {
        return $this->hasMany(Serie::class, ['id_car_serie' => 'serie_id'])->via('skinSeries');
    }
}
