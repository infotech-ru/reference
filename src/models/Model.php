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
 *
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
 * @property-read ModelCountry[] $modelCountries
 */
class Model extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'models';
    }

    public static function find(): ModelQuery
    {
        return new ModelQuery(static::class);
    }

    /**
     * @param $brandId
     * @param $recentOnly
     * @return array
     * @throws InvalidConfigException
     */
    public static function getList($brandId, $recentOnly): array
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

    public function getBrand(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }

    public function getGenerations(): \yii\db\ActiveQuery
    {
        return $this->hasMany(Generation::class, ['model_id' => 'id']);
    }

    public function getEquipments(): \yii\db\ActiveQuery
    {
        return $this->hasMany(Equipment::class, ['model_id' => 'id']);
    }

    public function getModelYears(): \yii\db\ActiveQuery
    {
        return $this->hasMany(ModelYear::class, ['model_id' => 'id']);
    }

    public function getColors(): \yii\db\ActiveQuery
    {
        return $this->hasMany(Color::class, ['model_id' => 'id']);
    }

    public function getCatalogEmplacements(): \yii\db\ActiveQuery
    {
        return $this->hasMany(CatalogEmplacement::class, ['model_id' => 'id']);
    }

    public function getModelOptionTags(): \yii\db\ActiveQuery
    {
        return $this->hasMany(ModelOptionTag::class, ['model_id' => 'id']);
    }

    public function getModelOptions(): \yii\db\ActiveQuery
    {
        return $this->hasMany(ModelOption::class, ['model_id' => 'id']);
    }

    public function getSkins(): \yii\db\ActiveQuery
    {
        return $this->hasMany(Skin::class, ['model_id' => 'id']);
    }

    public function getModelClass(): \yii\db\ActiveQuery
    {
        return $this->hasOne(ModelClass::class, ['id' => 'model_class_id']);
    }

    public function getModelSegment(): \yii\db\ActiveQuery
    {
        return $this->hasOne(ModelSegment::class, ['id' => 'model_segment_id']);
    }

    public function getFullName(): string
    {
        return $this->brand->name . ' ' . $this->name;
    }

    public function getModelImages(): \yii\db\ActiveQuery
    {
        return $this->hasMany(ModelImage::class, ['model_id' => 'id']);
    }

    public function getModelVideos(): \yii\db\ActiveQuery
    {
        return $this->hasMany(ModelVideo::class, ['model_id' => 'id']);
    }

    public function getModelCountries(): \yii\db\ActiveQuery
    {
        return $this->hasMany(ModelCountry::class, ['model_id' => 'id']);
    }
}
