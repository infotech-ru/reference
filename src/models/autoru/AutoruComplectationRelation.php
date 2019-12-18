<?php

namespace infotech\reference\models\autoru;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\ActiveQuery;
use infotech\reference\models\autoru\queries\AutoruComplectationMapQuery;

/**
 * This is the model class for table "eqt_autoru_complectation_map".
 *
 * @property int $complectation_id
 * @property int $modification_id
 *
 * @property AutoruConfigurationMap[] $mapped
 * @property int[] $mapIds
 */
class AutoruComplectationRelation extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'eqt_autoru_complectation_map';
    }
    
    public function rules(): array
    {
        return [
            [['complectation_id', 'modification_id'], 'required'],
            [['complectation_id', 'modification_id'], 'integer'],
            [['complectation_id', 'modification_id'], 'unique', 'targetAttribute' => ['complectation_id', 'modification_id']],
            [['modification_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutoruModification::class, 'targetAttribute' => ['modification_id' => 'id']],
            [['complectation_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutoruComplectation::class, 'targetAttribute' => ['complectation_id' => 'id']],
        ];
    }
    
    public function getModification(): ActiveQuery
    {
        return $this->hasOne(AutoruModification::class, ['id' => 'modification_id']);
    }
    
    public function getComplectation(): ActiveQuery
    {
        return $this->hasOne(AutoruComplectation::class, ['id' => 'complectation_id']);
    }
    
    public function getMapped(): ActiveQuery
    {
        return $this->hasMany(AutoruComplectationMapped::class, [
            'complectation_id' => 'complectation_id',
            'modification_id' => 'modification_id'
        ]);
    }
    
    public function getMapIds()
    {
        return array_column($this->mapped, 'map_id');
    }
    
    public function attributeLabels(): array
    {
        return [
            'complectation_id' => 'Complectation ID',
            'modification_id' => 'Modification ID',
        ];
    }
    
    public static function find(): AutoruComplectationMapQuery
    {
        return new AutoruComplectationMapQuery(static::class);
    }
}
