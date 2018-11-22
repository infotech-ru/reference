<?php

namespace infotech\reference\models;


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