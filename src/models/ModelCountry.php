<?php

namespace infotech\reference\models;

/**
 * Class ModelCountry
 * @package infotech\reference\models
 *
 * @property integer $model_id
 * @property integer $country_id
 *
 * @property Model $model
 * @property Country $country
 */
class ModelCountry extends ActiveRecord
{
    public static function tableName()
    {
        return 'model_country';
    }

    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

    public function getCountry()
    {
        return $this->hasOne(Country::class, ['id' => 'country_id']);
    }
}
