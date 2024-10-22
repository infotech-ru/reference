<?php

namespace infotech\reference\models;

use yii\db\ActiveQuery;

/**
 * Class LegalEntitiesTypes
 *
 * @property string $name
 * @property string $full_name
 * @property integer $order
 * @property integer $code_okopf
 * @property-read Country[] $countries
 *
 * @package infotech\reference\models
 */
class LegalEntityType extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'legal_entity_type';
    }

    public static function getList(): array
    {
        return static::find()->select('name, id')->indexBy('id')->orderBy(['order' => SORT_DESC])->column();
    }

    public static function find(): LegalEntityTypeQuery
    {
        return new LegalEntityTypeQuery(static::class);
    }

    public function getCountries(): ActiveQuery
    {
        return $this->hasMany(Country::class, ['id' => 'country_id'])
            ->viaTable(LegalEntityTypeCountry::tableName(), ['legal_entity_type_id' => 'id']);
    }
}
