<?php

namespace infotech\reference;

/**
 * Class ModelYear
 * @package infotech\reference
 * @property integer $id
 * @property integer $model_id
 * @property integer $year
 * @property boolean $is_recent
 * @property boolean $is_default
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

    public function getModel(): ModelQuery
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }
}