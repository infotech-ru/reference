<?php

namespace infotech\reference;


/**
 * Class ModelOption
 * @package infotech\reference
 * @property integer $id
 * @property integer $model_id
 * @property integer $option_group_id
 * @property integer $model_option_tag_id
 * @property string  $name
 * @property string  $created_at
 * @property string  $updated_at
 */
class ModelOption extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'eqt_model_option';
    }

    public static function find()
    {
        return new ModelOptionQuery(get_called_class());
    }

    public function getModel(): ModelQuery
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

    public function getOptionGroup(): OptionGroupQuery
    {
        return $this->hasOne(OptionGroup::class, ['id' => 'option_group_id']);
    }

    public function getModelOptionTag(): ModelOptionTagQuery
    {
        return $this->hasOne(ModelOptionTag::class, ['id' => 'model_option_tag_id']);
    }
}