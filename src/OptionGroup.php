<?php

namespace infotech\reference;

/**
 * Class OptionGroup
 * @package infotech\reference
 * @property integer $id
 * @property integer $brand_id
 * @property string  $name
 * @property string  $created_at
 * @property string  $updated_at
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

    public function getBrand(): BrandQuery
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }
}