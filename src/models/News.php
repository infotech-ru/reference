<?php

namespace infotech\reference\models;

/**
 * Class News
 * @package infotech\reference\models
 * @property integer $id
 * @property string $date_public
 * @property integer $tags_bitmap
 * @property string $title
 * @property string $content
 * @property-read NewsBrand[] $newsBrands
 * @property-read Brand[] $brands
 */
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
