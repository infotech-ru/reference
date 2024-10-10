<?php

namespace infotech\reference\models;

use yii\db\ActiveQuery;

/**
 * Class LegalEntitiesTypes
 *
 * @property string $name
 * @property string $full_name
 * @property integer $country_id
 * @property integer $order
 * @property-read Country $country
 *
 * @package infotech\reference\models
 */
class LegalEntitiesTypes extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'legal_entities_types';
    }

    public static function getList(): array
    {
        return static::find()->select('name, id')->indexBy('id')->orderBy(['order' => SORT_DESC])->column();
    }

    public static function find(): LegalEntitiesTypesQuery
    {
        return new LegalEntitiesTypesQuery(static::class);
    }

    public function getCountry(): CountryQuery
    {
        return $this->hasOne(Country::class, ['id' => 'country_id']);
    }
}
