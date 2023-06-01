<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

/**
 * Class OptionGroup
 * @package infotech\reference\models
 * @property integer $id
 * @property integer $brand_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property int $ord
 * @property-read Brand $brand
 */
class OptionGroup extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'eqt_option_group';
    }

    public static function find()
    {
        return new OptionGroupQuery(static::class);
    }

    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }

    /**
     * @param $brandId
     * @return array
     * @throws InvalidConfigException
     */
    public static function getList($brandId): array
    {
        return static::find()->brand($brandId)->select('name, id')->indexBy('id')->column();
    }
}
