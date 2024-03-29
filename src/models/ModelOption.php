<?php

namespace infotech\reference\models;

/**
 * Class ModelOption
 * @package infotech\reference\models
 * @property integer $id
 * @property integer $model_id
 * @property integer $option_group_id
 * @property integer $model_option_tag_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property string $incompatible_options_codes
 * @property int $ord
 * @property-read Model $model
 * @property-read OptionGroup $optionGroup
 * @property-read ModelOptionTag $modelOptionTag
 */
class ModelOption extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'eqt_model_option';
    }

    public static function find()
    {
        return new ModelOptionQuery(static::class);
    }

    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

    public function getOptionGroup()
    {
        return $this->hasOne(OptionGroup::class, ['id' => 'option_group_id']);
    }

    public function getModelOptionTag()
    {
        return $this->hasOne(ModelOptionTag::class, ['id' => 'model_option_tag_id']);
    }
}
