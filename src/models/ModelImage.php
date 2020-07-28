<?php

namespace infotech\reference\models;

use Yii;

/**
 * Class ModelImage
 * @package infotech\reference\models
 * @property integer $id
 * @property integer $model_id
 * @property integer $generation_id
 * @property integer $series_id
 * @property string  $url
 * @property integer $category
 * @property integer $priority
 * @property integer $status
 * @property-read Model $model
 */
class ModelImage extends ActiveRecord
{
    const STATUS_ACTIVE = 0;
    const STATUS_DELETED = 1;

    const CATEGORY_EXTERNAL = 0;
    const CATEGORY_INTERNAL = 1;

    public static function getStatusList(): array
    {
        return [
            self::STATUS_ACTIVE => Yii::t('app', 'Активно'),
            self::STATUS_DELETED => Yii::t('app', 'Удалено'),
        ];
    }

    public static function getCategoryList(): array
    {
        return [
            self::CATEGORY_EXTERNAL => Yii::t('app', 'Экстернал'),
            self::CATEGORY_INTERNAL => Yii::t('app', 'Интернал'),
        ];
    }

    public static function tableName(): string
    {
        return 'model_image';
    }

    public static function find()
    {
        return new ModelImageQuery(static::class);
    }

    public function getModel()
    {
        return $this->hasOne(Model::class, ['id'=>'model_id']);
    }

    public function getGeneration()
    {
        return $this->hasOne(Generation::class, ['id_car_generation' => 'generation_id']);
    }

    public function getSeries()
    {
        return $this->hasOne(Serie::class, ['id_car_serie' => 'series_id']);
    }
}
