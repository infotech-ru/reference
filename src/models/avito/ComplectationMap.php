<?php

namespace infotech\reference\models\avito;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\avito\queries\ComplectationMapQuery;
use infotech\reference\models\Equipment;
use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "avito_complectation_map".
 *
 * @property int           $complectation_id
 * @property int           $ref_complectation_id
 *
 * @property Complectation $complectation
 * @property Equipment     $refEquipments
 */
class ComplectationMap extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'avito_complectation_map';
    }

    public static function find(): ComplectationMapQuery
    {
        return new ComplectationMapQuery(static::class);
    }

    public function rules(): array
    {
        return [
            [['complectation_id', 'ref_complectation_id'], 'required'],
            [['complectation_id', 'ref_complectation_id'], 'integer'],
            [
                ['complectation_id', 'ref_complectation_id'],
                'unique',
                'targetAttribute' => ['complectation_id', 'ref_complectation_id']
            ],
            [
                ['complectation_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Complectation::class,
                'targetAttribute' => ['complectation_id' => 'id']
            ],
            [
                ['ref_complectation_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Equipment::class,
                'targetAttribute' => ['ref_complectation_id' => 'id']
            ],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'complectation_id' => Yii::t('app', 'Complectation ID'),
            'ref_complectation_id' => Yii::t('app', 'Ref Complectation ID'),
        ];
    }

    public function getComplectation(): ActiveQuery
    {
        return $this->hasOne(Complectation::class, ['id' => 'complectation_id']);
    }

    public function getRefEquipments(): ActiveQuery
    {
        return $this->hasOne(Equipment::class, ['id' => 'ref_complectation_id']);
    }
}
