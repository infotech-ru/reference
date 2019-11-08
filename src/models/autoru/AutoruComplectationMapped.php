<?php

namespace infotech\reference\models\autoru;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\autoru\queries\AutoruComplectationMappedQuery;

class AutoruComplectationMapped extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'eqt_autoru_complectation_mapped';
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['complectation_id', 'modification_id', 'map_id'], 'required'],
            [['complectation_id', 'modification_id', 'map_id'], 'integer'],
            [['complectation_id', 'modification_id', 'map_id'], 'unique', 'targetAttribute' => ['complectation_id', 'modification_id', 'map_id']],
            [['complectation_id', 'modification_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutoruComplectationRelation::className(), 'targetAttribute' => ['complectation_id' => 'complectation_id', 'modification_id' => 'modification_id']],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'complectation_id' => 'Complectation ID',
            'modification_id' => 'Modification ID',
            'map_id' => 'Map ID',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComplectation()
    {
        return $this->hasOne(AutoruComplectationRelation::className(), ['complectation_id' => 'complectation_id', 'modification_id' => 'modification_id']);
    }
    
    /**
     * {@inheritdoc}
     * @return AutoruComplectationMappedQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AutoruComplectationMappedQuery(get_called_class());
    }
}
