<?php

namespace infotech\reference\models;

use yii\db\ActiveQuery;

/**
 * @property integer $legal_entity_type_id
 * @property integer $country_id
 *
 * @package infotech\reference\models
 */
class LegalEntityTypeCountry extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'legal_entity_type_country';
    }
}
