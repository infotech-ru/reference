<?php

namespace infotech\reference\models;

/**
 * Class ModelVideo
 * @package infotech\reference\models
 * @property integer $id
 * @property integer $model_id
 * @property string  $url
 * @property integer $type
 * @property integer $priority
 * @property integer $status
 */
class ModelVideo extends ActiveRecord
{
    const STATUS_ACTIVE = 0;
    const STATUS_DELETED = 1;

    const TYPE_URL = 0;
    const TYPE_YOUTUBE = 1;

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
        return $this->hasOne(Model::class, ['id'=>'model_id']);
    }
}