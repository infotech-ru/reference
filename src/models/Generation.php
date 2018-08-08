<?php

namespace infotech\reference\models;

/**
 * Class Generation
 * @package infotech\reference\models
 * @property integer $id_car_generation
 * @property string  $name
 * @property integer $model_id
 * @property string  $year_begin
 * @property string  $year_end
 * @property boolean $is_visible
 * @property integer $id_car_type
 * @property boolean $is_recent
 * @property integer $origin_id
 * @property-read Model $model
 * @property-read Serie[] $series
 */
class Generation extends ActiveRecord
{
    public static function primaryKey(): array
    {
        return ['id_car_generation'];
    }

    public static function tableName(): string
    {
        return 'car_generation';
    }

    public static function find()
    {
        return new GenerationQuery(static::class);
    }

    public static function getList($modelId, $recentOnly, $year = null)
    {
        $query = static::find()
            ->isVisible(1)
            ->model($modelId)
            ->select('name, id_car_generation')
            ->indexBy('id_car_generation');
        if ($recentOnly) {
            $query->isRecent(true);
        }

        return $query->column();
    }

    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

    public function getSeries()
    {
        return $this->hasMany(Serie::class, ['id_car_generation' => 'id_car_generation']);
    }
}
