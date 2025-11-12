<?php

namespace infotech\reference\models\eltpoisk;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\Brand;
use infotech\reference\models\eltpoisk\queries\LegalEntityTypeMapQuery;
use infotech\reference\models\LegalEntityType;
use Yii;

/**
 * This is the model class for table "elt_legal_entity_type_map".
 *
 * @property int $id
 * @property string $name
 * @property int $legal_entity_type_id
 *
 * @property LegalEntityType $legalEntityType
 */
class LegalEntityTypeMap extends ActiveRecord
{
    public static function tableName()
    {
        return 'elt_legal_entity_type_map';
    }

    public static function find()
    {
        return new LegalEntityTypeMapQuery(static::class);
    }

    public function rules()
    {
        return [
            [['legal_entity_type_id'], 'required'],
            [['legal_entity_type_id'], 'integer'],
            [
                ['legal_entity_type_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Brand::class,
                'targetAttribute' => ['legal_entity_type_id' => 'id']
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'legal_entity_type_id' => Yii::t('app', 'Ref Brand ID'),
        ];
    }

    public function getLegalEntityType()
    {
        return $this->hasOne(LegalEntityType::class, ['id' => 'legal_entity_type_id']);
    }
}
