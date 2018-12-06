<?php

namespace infotech\reference\models;

/**
 * Class ModelYearEquipment
 * @package infotech\reference\models
 * @property integer $model_year_id
 * @property string $equipment_id
 * @property-read ModelYear $modelYear
 * @property-read Equipment $equipment
 */
class ModelYearEquipment extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'model_year_equipment';
    }

    public static function find()
    {
        return new ModelYearEquipmentQuery(static::class);
    }

    public function getModelYear()
    {
        return $this->hasOne(ModelYear::class, ['id' => 'model_year_id']);
    }

    public function getEquipment()
    {
        return $this->hasOne(Equipment::class, ['id' => 'equipment_id']);
    }
}