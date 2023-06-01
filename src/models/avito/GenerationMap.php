<?php

namespace infotech\reference\models\avito;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\avito\queries\GenerationMapQuery;
use infotech\reference\models\Generation as RefGeneration;
use Yii;

/**
 * This is the model class for table "avito_generation_map".
 *
 * @property int $generation_id
 * @property int $ref_generation_id
 *
 * @property Generation $generation
 * @property RefGeneration $refGeneration
 */
class GenerationMap extends ActiveRecord
{
    public static function tableName()
    {
        return 'avito_generation_map';
    }

    public static function find()
    {
        return new GenerationMapQuery(static::class);
    }

    public function rules()
    {
        return [
            [['generation_id', 'ref_generation_id'], 'required'],
            [['generation_id', 'ref_generation_id'], 'integer'],
            [
                ['generation_id', 'ref_generation_id'],
                'unique',
                'targetAttribute' => ['generation_id', 'ref_generation_id']
            ],
            [
                ['generation_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Generation::class,
                'targetAttribute' => ['generation_id' => 'id']
            ],
            [
                ['ref_generation_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => RefGeneration::class,
                'targetAttribute' => ['ref_generation_id' => 'id_car_generation']
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'generation_id' => Yii::t('app', 'Generation ID'),
            'ref_generation_id' => Yii::t('app', 'Ref Generation ID'),
        ];
    }

    public function getGeneration()
    {
        return $this->hasOne(Generation::class, ['id' => 'generation_id']);
    }

    public function getRefGeneration()
    {
        return $this->hasOne(RefGeneration::class, ['id_car_generation' => 'ref_generation_id']);
    }
}
