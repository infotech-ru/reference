<?php

namespace infotech\reference\models\avito;

use infotech\reference\models\avito\queries\ComplectationMapQuery;
use infotech\reference\models\Equipment;
use Yii;
use infotech\reference\models\ActiveRecord;

/**
 * This is the model class for table "avito_complectation_map".
 *
 * @property int $complectation_id
 * @property int $ref_complectation_id
 *
 * @property Complectation $complectation
 * @property Equipment $complectation0
 */
class ComplectationMap extends ActiveRecord
{
    public static function tableName()
    {
        return 'avito_complectation_map';
    }

    public function rules()
    {
        return [
            [['complectation_id', 'ref_complectation_id'], 'required'],
            [['complectation_id', 'ref_complectation_id'], 'integer'],
            [['complectation_id', 'ref_complectation_id'], 'unique', 'targetAttribute' => ['complectation_id', 'ref_complectation_id']],
            [['complectation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Complectation::class, 'targetAttribute' => ['complectation_id' => 'id']],
            [['complectation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Equipment::class, 'targetAttribute' => ['complectation_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'complectation_id' => Yii::t('app', 'Complectation ID'),
            'ref_complectation_id' => Yii::t('app', 'Ref Complectation ID'),
        ];
    }

    public function getComplectation()
    {
        return $this->hasOne(Complectation::class, ['id' => 'complectation_id']);
    }

    public function getComplectation0()
    {
        return $this->hasOne(Equipment::class, ['id' => 'complectation_id']);
    }

    public static function find()
    {
        return new ComplectationMapQuery(static::class);
    }
}
