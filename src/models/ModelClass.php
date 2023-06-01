<?php

namespace infotech\reference\models;

use Yii;
use yii\base\InvalidConfigException;

/**
 * Class ModelClass
 * @package infotech\reference\models
 * @property integer $id
 * @property string $name
 * @property integer $status
 */
class ModelClass extends ActiveRecord
{
    public const  STATUS_ACTIVE = 0;
    public const  STATUS_DELETED = 1;

    public static function getStatusList(): array
    {
        return [
            self::STATUS_ACTIVE => Yii::t('app', 'Активно'),
            self::STATUS_DELETED => Yii::t('app', 'Удалено'),
        ];
    }

    public static function tableName(): string
    {
        return 'model_class';
    }

    /**
     * @return array
     * @throws InvalidConfigException
     */
    public static function getList(): array
    {
        return static::find()
            ->select('name, id')
            ->indexBy('id')
            ->status(self::STATUS_ACTIVE)
            ->column();
    }

    public static function find(): ModelClassQuery
    {
        return new ModelClassQuery(static::class);
    }
}
