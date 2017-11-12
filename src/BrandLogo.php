<?php

namespace infotech\reference;

/**
 * Class BrandLogo
 * @package infotech\reference
 * @property integer $brand_id
 * @property string  $url
 */
class BrandLogo extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'eqt_brand_logo';
    }

    public static function primaryKey(): string
    {
        return 'brand_id';
    }

    public static function find()
    {
        return new BrandLogoQuery(get_called_class());
    }

    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }
}