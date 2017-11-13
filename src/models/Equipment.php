<?php

namespace infotech\reference\models;

/**
 * Class Equipment
 * @package infotech\reference\models
 * @property integer $id
 * @property integer $model_id
 * @property integer $series_id
 * @property string  $name
 * @property string  $archive_name
 * @property string  $tech_name
 * @property integer $order
 * @property integer $status
 * @property string  $created_at
 * @property string  $updated_at
 * @property integer $origin_id
 * @property Model $model
 * @property Serie $serie
 * @property CatalogEmplacement[] $catalogEmplacements
 */
class Equipment extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'eqt_equipment';
    }

    public static function find()
    {
        return new EquipmentQuery(get_called_class());
    }

    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

    public function getSerie()
    {
        return $this->hasOne(Serie::class, ['id_car_serie' => 'series_id']);
    }

    public function getCatalogEmplacements()
    {
        return $this->hasMany(CatalogEmplacement::class, ['equipment_id' => 'id']);
    }
}