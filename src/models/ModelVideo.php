<?php

namespace infotech\reference\models;

use Yii;

/**
 * Class ModelVideo
 * @package infotech\reference\models
 * @property integer $id
 * @property integer $model_id
 * @property string  $url
 * @property integer $type
 * @property integer $priority
 * @property integer $status
 * @property-read Model $model
 */
class ModelVideo extends ActiveRecord
{
    const STATUS_ACTIVE = 0;
    const STATUS_DELETED = 1;

    const TYPE_URL = 0;
    const TYPE_YOUTUBE = 1;

    public static function getStatusList(): array
    {
        return [
            self::STATUS_ACTIVE => Yii::t('app', 'Активно'),
            self::STATUS_DELETED => Yii::t('app', 'Удалено'),
        ];
    }

    public static function getTypeList(): array
    {
        return [
            self::TYPE_URL => Yii::t('app', 'Видео'),
            self::TYPE_YOUTUBE => Yii::t('app', 'YouTube'),
        ];
    }

    public static function tableName(): string
    {
        return 'model_video';
    }

    public static function find()
    {
        return new ModelVideoQuery(static::class);
    }

    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }
}
