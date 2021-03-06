<?php

namespace infotech\reference\models\avito;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\avito\queries\ModificationMapModQuery;
use infotech\reference\models\Modification as RefModification;
use Yii;

/**
 * This is the model class for table "avito_modification_map_mod".
 *
 * @property int $modification_id
 * @property int $ref_modification_id
 *
 * @property Modification $modification
 * @property RefModification $refModification
 */
class ModificationMapMod extends ActiveRecord
{
    public static function tableName()
    {
        return 'avito_modification_map_mod';
    }

    public static function find()
    {
        return new ModificationMapModQuery(static::class);
    }

    public function rules()
    {
        return [
            [['modification_id', 'ref_modification_id'], 'required'],
            [['modification_id', 'ref_modification_id'], 'integer'],
            [
                ['modification_id', 'ref_modification_id'],
                'unique',
                'targetAttribute' => ['modification_id', 'ref_modification_id']
            ],
            [
                ['modification_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Modification::class,
                'targetAttribute' => ['modification_id' => 'id']
            ],
            [
                ['ref_modification_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => RefModification::class,
                'targetAttribute' => ['ref_modification_id' => 'id_car_modification']
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'modification_id' => Yii::t('app', 'Modification ID'),
            'ref_modification_id' => Yii::t('app', 'Ref Modification ID'),
        ];
    }

    public function getModification()
    {
        return $this->hasOne(Modification::class, ['id' => 'modification_id']);
    }

    public function getRefModification()
    {
        return $this->hasOne(RefModification::class, ['id_car_modification' => 'modification_id']);
    }
}
