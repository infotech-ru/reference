<?php

namespace infotech\reference\models;

/**
 * Class OptionGroup
 * @package infotech\reference\models
 * @property integer $id
 * @property integer $brand_id
 * @property string  $name
 * @property string  $created_at
 * @property string  $updated_at
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
        return new OptionGroupQuery(get_called_class());
    }

    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }
}