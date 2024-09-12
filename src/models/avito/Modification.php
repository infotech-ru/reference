<?php

namespace infotech\reference\models\avito;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\avito\queries\ModificationQuery;
use infotech\reference\models\Modification as RefModification;
use infotech\reference\models\Serie;
use Yii;

/**
 * This is the model class for table "avito_modification".
 *
 * @property int $id
 * @property int $avito_id
 * @property string $name
 * @property int $generation_id
 * @property string $year_from
 * @property string $year_to
 * @property string $body_type
 * @property string $doors
 * @property string $fuel_type
 * @property string $drive_type
 * @property string $transmission
 * @property string $power
 * @property string $engine_size
 * @property boolean $is_archive
 *
 * @property Complectation[] $complectations
 * @property Generation $generation
 * @property ModificationMapMod[] $modificationMapMods
 * @property ModificationMapSerie[] $modificationMapSeries
 * @property Serie[] $refSeries
 * @property RefModification[] $refModification
 */
class Modification extends ActiveRecord
{
    public static function tableName()
    {
        return 'avito_modification';
    }

    public static function find()
    {
        return new ModificationQuery(static::class);
    }

    public function rules()
    {
        return [
            [['generation_id', 'avito_id'], 'integer'],
            [
                [
                    'name',
                    'year_from',
                    'year_to',
                    'body_type',
                    'doors',
                    'fuel_type',
                    'drive_type',
                    'transmission',
                    'power',
                    'engine_size'
                ],
                'string',
                'max' => 255
            ],
            [
                ['generation_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Generation::class,
                'targetAttribute' => ['generation_id' => 'id']
            ],
            ['is_archive', 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'avito_id' => Yii::t('app', 'Avito ID'),
            'name' => Yii::t('app', 'Name'),
            'generation_id' => Yii::t('app', 'Generation ID'),
            'year_from' => Yii::t('app', 'Year From'),
            'year_to' => Yii::t('app', 'Year To'),
            'body_type' => Yii::t('app', 'Body Type'),
            'doors' => Yii::t('app', 'Doors'),
            'fuel_type' => Yii::t('app', 'Fuel Type'),
            'drive_type' => Yii::t('app', 'Drive Type'),
            'transmission' => Yii::t('app', 'Transmission'),
            'power' => Yii::t('app', 'Power'),
            'engine_size' => Yii::t('app', 'Engine Size'),
        ];
    }

    public function getComplectations()
    {
        return $this->hasMany(Complectation::class, ['modification_id' => 'id']);
    }

    public function getGeneration()
    {
        return $this->hasOne(Generation::class, ['id' => 'generation_id']);
    }

    public function getModificationMapMods()
    {
        return $this->hasMany(ModificationMapMod::class, ['modification_id' => 'id']);
    }

    public function getModificationMapSeries()
    {
        return $this->hasMany(ModificationMapSerie::class, ['modification_id' => 'id']);
    }

    public function getRefSeries()
    {
        return $this->hasMany(
            Serie::class,
            ['id_car_serie' => 'ref_serie_id']
        )->viaTable(
            'avito_modification_map_serie',
            ['modification_id' => 'id']
        );
    }

    public function getRefModification()
    {
        return $this->hasMany(
            RefModification::class,
            ['id_car_modification' => 'ref_modification_id']
        )->viaTable(
            'avito_modification_map_mod',
            ['modification_id' => 'id']
        );
    }
}
