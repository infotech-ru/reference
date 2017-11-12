<?php

namespace infotech\reference;


/**
 * Class ModelOptionTag
 * @package infotech\reference
 * @property integer $id
 * @property integer $model_id
 * @property integer $name
 */
class ModelOptionTag extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'eqt_model_option_tag';
    }

    public static function find()
    {
        return new ModelOptionTagQuery(get_called_class());
    }

    public function getModel(): ModelQuery
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }
}