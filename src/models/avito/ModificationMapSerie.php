<?php

namespace infotech\reference\models\avito;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\avito\queries\ModificationMapSerieQuery;
use infotech\reference\models\Serie;
use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "avito_modification_map_serie".
 *
 * @property int          $modification_id
 * @property int          $ref_serie_id
 *
 * @property Modification $modification
 * @property Serie        $refSerie
 */
class ModificationMapSerie extends ActiveRecord
{
    public static function tableName()
    {
        return 'avito_modification_map_serie';
    }

    public static function find(): ModificationMapSerieQuery
    {
        return new ModificationMapSerieQuery(static::class);
    }

    public function rules(): array
    {
        return [
            [['modification_id', 'ref_serie_id'], 'required'],
            [['modification_id', 'ref_serie_id'], 'integer'],
            [['modification_id', 'ref_serie_id'], 'unique', 'targetAttribute' => ['modification_id', 'ref_serie_id']],
            [
                ['modification_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Modification::class,
                'targetAttribute' => ['modification_id' => 'id']
            ],
            [
                ['ref_serie_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Serie::class,
                'targetAttribute' => ['ref_serie_id' => 'id_car_serie']
            ],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'modification_id' => Yii::t('app', 'Modification ID'),
            'ref_serie_id' => Yii::t('app', 'Ref Serie ID'),
        ];
    }

    public function getModification(): ActiveQuery
    {
        return $this->hasOne(Modification::class, ['id' => 'modification_id']);
    }

    public function getRefSerie(): ActiveQuery
    {
        return $this->hasOne(Serie::class, ['id_car_serie' => 'ref_serie_id']);
    }
}
