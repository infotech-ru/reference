<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

/**
 * Class ModelYear
 * @package infotech\reference\models
 * @property integer $id
 * @property integer $model_id
 * @property integer $year
 * @property boolean $is_recent
 * @property boolean $is_default
 * @property boolean $code
 * @property-read Model $model
 * @property-read ModelYearEquipment[] $modelYearEquipments
 * @property-read Equipment[] $equipments
 */
class ModelYear extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'model_year';
    }

    public static function find()
    {
        return new ModelYearQuery(static::class);
    }

    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

    /**
     * @param $modelId
     * @param $recentOnly
     * @return array
     * @throws InvalidConfigException
     */
    public static function getList($modelId, $recentOnly)
    {
        $query = static::find()
            ->model($modelId)
            ->select('year, id')
            ->indexBy('id');
        if ($recentOnly) {
            $query->isRecent(true);
        }

        return $query->column();
    }

    public function getModelYearEquipments()
    {
        return $this->hasMany(ModelYearEquipment::class, ['model_year_id' => 'id']);
    }

    public function getEquipments()
    {
        return $this->hasMany(Equipment::class, ['id' => 'equipment_id'])->via('modelYearEquipments');
    }
}
