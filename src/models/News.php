<?php

namespace infotech\reference\models;

class News extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'news';
    }

    public static function find()
    {
        return new NewsQuery(static::class);
    }

    public function getNewsBrands()
    {
        return $this->hasMany(NewsBrand::class, ['news_id' => 'id']);
    }

    public function getBrands()
    {
        return $this->hasMany(Brand::class, ['id' => 'brand_id'])->via('newsBrands');
    }
}