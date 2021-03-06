<?php

namespace infotech\reference\models\dromru;

use infotech\reference\models\Generation;
use infotech\reference\models\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "dromru_model_generation_map".
 *
 * @property int $dromru_model_id ID из dromru_model
 * @property int $generation_id Наш ID поколения
 *
 * @property-read Model $model
 * @property-read Generation $generation
 *
 */
class ModelGenerationMap extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dromru_model_generation_map';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dromru_model_id', 'generation_id'], 'required'],
            [['dromru_model_id', 'generation_id'], 'integer'],
            ['dromru_model_id', 'exist', 'targetRelation' => 'model'],
            ['generation_id', 'exist', 'targetRelation' => 'generation'],
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'dromru_model_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getGeneration()
    {
        return $this->hasOne(Generation::class, ['id_car_generation' => 'generation_id']);
    }
}
