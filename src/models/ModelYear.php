<?php

namespace infotech\reference\models;

/**
 * Class ModelYear
 * @package infotech\reference\models
 * @property integer $id
 * @property integer $model_id
 * @property integer $year
 * @property boolean $is_recent
 * @property boolean $is_default
 * @property-read Model $model
 */
class ModelYear extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'model_year';
    }

    public static function find()
    {
        return new ModelYearQuery(get_called_class());
    }

    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

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
}