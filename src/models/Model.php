<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

/**
 * @property integer $brand_id
 * @property integer $id
 * @property string $name
 * @property string $tradein_code
 * @property string $code
 * @property integer $is_recent
 * @property string $dealerpoint_code
 * @property integer $ord
 * @property integer $ecm_id
 * @property boolean $is_deleted
 * @property boolean $is_commercial
 * @property integer $origin_id
 * @property integer $model_class_id
 * @property integer $model_segment_id
 * @property-read Brand $brand
 * @property-read Generation[] $generations
 * @property-read Equipment[] $equipments
 * @property-read ModelYear[] $modelYears
 * @property-read Color[] $colors
 * @property-read CatalogEmplacement[] $catalogEmplacements
 * @property-read ModelOptionTag[] $modelOptionTags
 * @property-read ModelOption[] $modelOptions
 * @property-read Skin[] $skins
 * @property-read ModelImage[] $modelImages
 * @property-read ModelVideo[] $modelVideos
 */
class Model extends ActiveRecord
{
    public static function tableName()
    {
        return 'models';
    }

    public static function find()
    {
        return new ModelQuery(static::class);
    }

    /**
     * @param $brandId
     * @param $recentOnly
     * @return array
     * @throws InvalidConfigException
     */
    public static function getList($brandId, $recentOnly)
    {
        $query = static::find()
            ->isDeleted(0)
            ->brand($brandId)
            ->select('name, id')
            ->indexBy('id');
        if ($recentOnly) {
            $query->isRecent(true);
        }

        return $query->column();
    }

    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }

    public function getGenerations()
    {
        return $this->hasMany(Generation::class, ['model_id' => 'id']);
    }

    public function getEquipments()
    {
        return $this->hasMany(Equipment::class, ['model_id' => 'id']);
    }

    public function getModelYears()
    {
        return $this->hasMany(ModelYear::class, ['model_id' => 'id']);
    }

    public function getColors()
    {
        return $this->hasMany(Color::class, ['model_id' => 'id']);
    }

    public function getCatalogEmplacements()
    {
        return $this->hasMany(CatalogEmplacement::class, ['model_id' => 'id']);
    }

    public function getModelOptionTags()
    {
        return $this->hasMany(ModelOptionTag::class, ['model_id' => 'id']);
    }

    public function getModelOptions()
    {
        return $this->hasMany(ModelOption::class, ['model_id' => 'id']);
    }

    public function getSkins()
    {
        return $this->hasMany(Skin::class, ['model_id' => 'id']);
    }

    public function getModelClass()
    {
        return $this->hasOne(ModelClass::class, ['id' => 'model_class_id']);
    }

    public function getModelSegment()
    {
        return $this->hasOne(ModelSegment::class, ['id' => 'model_segment_id']);
    }

    public function getFullName()
    {
        return $this->brand->name . ' ' . $this->name;
    }

    public function getModelImages()
    {
        return $this->hasMany(ModelImage::class, ['model_id'=>'id']);
    }

    public function getModelVideos()
    {
        return $this->hasMany(ModelVideo::class, ['model_id'=>'id']);
    }
}
