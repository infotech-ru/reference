<?php

namespace infotech\reference\models;

/**
 * Class Color
 * @package infotech\reference\models
 * @property integer $id
 * @property string  $code
 * @property integer $model_id
 * @property integer $common_color_id
 * @property string  $rgb
 * @property string  $name
 * @property string  $created_at
 * @property string  $updated_at
 * @property-read Model $model
 * @property-read Color $commonColor
 * @property-read CatalogEmplacement[] $catalogEmplacements
 */
class Color extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'eqt_color';
    }

    public static function find()
    {
        return new ColorQuery(get_called_class());
    }

    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

    public function getCommonColor()
    {
        return $this->hasOne(Color::class, ['id' => 'common_color_id']);
    }

    public function getCatalogEmplacements()
    {
        return $this->hasMany(CatalogEmplacement::class, ['color_id' => 'id']);
    }
}