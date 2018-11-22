<?php

namespace infotech\reference\models;

/**
 * Class NewsBrand
 * @package infotech\reference\models
 * @property integer $news_id
 * @property integer $brand_id
 * @property-read News $news
 * @property-read Brand $brand
 */
class NewsBrand extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'news_brand';
    }

    public static function find()
    {
        return new NewsBrandQuery(static::class);
    }

    public function getNews()
    {
        return $this->hasOne(News::class, ['id' => 'news_id']);
    }

    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }
}