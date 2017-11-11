<?php

namespace infotech\reference;

/**
 * Class Color
 * @package infotech\reference
 * @property integer $id
 * @property string  $code
 * @property integer $model_id
 * @property integer $common_color_id
 * @property string  $rgb
 * @property string  $name
 * @property string  $created_at
 * @property string  $updated_at
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

    public function getModel(): ModelQuery
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

    public function getCommonColor(): ColorQuery
    {
        return $this->hasOne(Color::class, ['id' => 'common_color_id']);
    }

    public function getEmplacements(): EmplacementQuery
    {
        return $this->hasMany(Emplacement::class, ['color_id' => 'id']);
    }
}