<?php

namespace infotech\reference\models;

/**
 * Class ModelAliasCountry
 *
 * @package infotech\reference\models
 *
 * @property integer $model_alias_id
 * @property integer $country_id
 *
 * @property ModelAlias $modelAlias
 * @property Country $country
 */
class ModelAliasCountry extends ActiveRecord
{
    public static function tableName()
    {
        return 'model_country';
    }

    public function getModelAlias()
    {
        return $this->hasOne(ModelAlias::class, ['id' => 'model_id']);
    }

    public function getCountry()
    {
        return $this->hasOne(Country::class, ['id' => 'country_id']);
    }
}
