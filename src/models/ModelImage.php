<?php

namespace infotech\reference\models;

/**
 * Class ModelImage
 * @package infotech\reference\models
 * @property integer $id
 * @property integer $model_id
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
}