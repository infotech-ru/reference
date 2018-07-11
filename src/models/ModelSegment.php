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

    public static function getStatusList(): array
    {
        return [
            self::STATUS_ACTIVE => \Yii::t('app', 'Активно'),
            self::STATUS_DELETED => \Yii::t('app', 'Удалено'),
        ];
    }

    public static function tableName(): string
    {
        return 'model_segment';
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