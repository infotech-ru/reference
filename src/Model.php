<?php

namespace infotech\reference;


/**
 * @property integer $brand_id
 * @property integer $id
 * @property string  $name
 * @property string  $tradein_code
 * @property integer $is_recent
 * @property string  $dealerpoint_code
 * @property integer $ord
 * @property integer $ecm_id
 * @property boolean $is_deleted
 * @property boolean $is_commercial
 * @property integer $origin_id
 */
class Model extends ActiveRecord
{
    public static function tableName()
    {
        return 'models';
    }

    public static function find()
    {
        return new ModelQuery(get_called_class());
    }

    public function getBrand(): BrandQuery
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }

    public function getGenerations(): GenerationQuery
    {
        return $this->hasMany(Generation::class, ['model_id' => 'id']);
    }

    public function getEquipments(): EquipmentQuery
    {
        return $this->hasMany(Equipment::class, ['model_id' => 'id']);
    }

    public function getModelYears(): ModelYearQuery
    {
        return $this->hasMany(ModelYear::class, ['model_id' => 'id']);
    }

    public function getColors(): ColorQuery
    {
        return $this->hasMany(Color::class, ['model_id' => 'id']);
    }

    public function getEmplacements(): EmplacementQuery
    {
        return $this->hasMany(Emplacement::class, ['model_id' => 'id']);
    }

    public function getModelOptionTags(): ModelOptionTagQuery
    {
        return $this->hasMany(ModelOptionTag::class, ['model_id' => 'id']);
    }

    public function getModelOptions(): ModelOptionQuery
    {
        return $this->hasMany(ModelOption::class, ['model_id' => 'id']);
    }
}
