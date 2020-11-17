<?php

namespace infotech\reference\models;

/**
 * Class BrandLogo
 * @package infotech\reference\models
 * @property integer $brand_id
 * @property string $url
 * @property-read Brand $brand
 */
class BrandLogo extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'eqt_brand_logo';
    }

    public static function primaryKey(): array
    {
        return ['brand_id'];
    }

    public static function find()
    {
        return new BrandLogoQuery(static::class);
    }

    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }
}
