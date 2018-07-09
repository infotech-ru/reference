<?php

namespace infotech\reference\models;

/**
 * Class ModelSegment
 * @package infotech\reference\models
 * @property integer $id
 * @property string $name
 * @property integer $status
 */
class ModelSegment extends ActiveRecord
{
    const STATUS_ACTIVE = 0;
    const STATUS_DELETED = 1;

    public static function tableName(): string
    {
        return 'model_class';
    }

    public static function getList()
    {
        return static::find()
            ->select('name, id')
            ->indexBy('id')
            ->status(self::STATUS_ACTIVE)
            ->column();
    }

    public static function find()
    {
        return new ModelSegmentQuery(static::class);
    }
}