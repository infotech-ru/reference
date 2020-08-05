<?php

namespace infotech\reference\models\dromru;

use infotech\reference\models\Modification;
use infotech\reference\models\ActiveRecord;

/**
 * This is the model class for table "dromru_model_modification_map".
 *
 * @property int $dromru_model_id ID из dromru_model
 * @property int $modification_id Наш ID поколения
 *
 * @property-read Model $model
 * @property-read Modification $modification
 *
 */
class ModelModificationMap extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dromru_model_modification_map';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dromru_model_id', 'modification_id'], 'required'],
            [['dromru_model_id', 'modification_id'], 'integer'],
            ['dromru_model_id', 'exist', 'targetRelation' => 'model'],
            ['modification_id', 'exist', 'targetRelation' => 'modification'],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'dromru_model_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModification()
    {
        return $this->hasOne(Modification::class, ['id_car_modification' => 'modification_id']);
    }
}
