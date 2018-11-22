<?php

namespace infotech\reference\models;


/**
 * Class Brand
 * @package infotech\reference\models
 * @property integer $id
 * @property string  $name
 * @property string $name_eng
 * @property string  $logo
 * @property string  $importer_db_name
 * @property string  $host
 * @property string  $token
 * @property integer $ecm_id
 * @property boolean $is_supported
 * @property integer $origin_id
 * @property integer $is_vin_manufacturer
 * @property-read Model[] $models
 * @property-read BrandLogo $brandLogo
 * @property-read OptionGroup[] $optionGroups
 * @property-read OrderType[] $orderTypes
 * @property-read NewsBrand[] $newsBrands
 * @property-read News[] $news
 */
class Brand extends ActiveRecord
{
    const SUBARU_ID = 111;
    const GAZ_ID = 127;
    const UAZ_ID = 134;
    const CHEVROLET_ID = 2;
    const CADILLAC_ID = 3;
    const MERCEDES_ID = 80;
    const SMART_ID = 108;

    public static function tableName(): string
    {
        return 'brands';
    }

    public static function getList(): array
    {
        return static::find()->select('name, id')->indexBy('id')->column();
    }

    public static function find()
    {
        return new BrandQuery(static::class);
    }

    public function getModels()
    {
        return $this->hasMany(Model::class, ['brand_id' => 'id']);
    }

    public function getBrandLogo()
    {
        return $this->hasOne(BrandLogo::class, ['brand_id' => 'id']);
    }

    public function getOptionGroups()
    {
        return $this->hasMany(OptionGroup::class, ['brand_id' => 'id']);
    }

    public function getOrderTypes()
    {
        return $this->hasMany(OrderType::class, ['brand_id' => 'id']);
    }

    public function getNews()
    {
        return $this->hasMany(News::class, ['id' => 'news_id'])->via('newsBrands');
    }

    public function getNewsBrands()
    {
        return $this->hasMany(NewsBrand::class, ['brand_id' => 'id']);
    }
}