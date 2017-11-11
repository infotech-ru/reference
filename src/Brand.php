<?php

namespace infotech\reference;


/**
 * Class Brand
 * @package infotech\reference
 * @property integer $id
 * @property string  $name
 * @property string  $logo
 * @property string  $importer_db_name
 * @property string  $host
 * @property string  $token
 * @property integer $ecm_id
 * @property boolean $is_supported
 * @property integer $origin_id
 */
class Brand extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'brands';
    }

    public static function find()
    {
        return new BrandQuery(get_called_class());
    }

    public function getModels(): ModelQuery
    {
        return $this->hasMany(Model::class, ['brand_id' => 'id']);
    }

    public function getBrandLogo(): BrandLogoQuery
    {
        return $this->hasOne(BrandLogo::class, ['brand_id' => 'id']);
    }

    public function getOptionGroups(): OptionGroupQuery
    {
        return $this->hasMany(OptionGroup::class, ['brand_id' => 'id']);
    }
}