<?php

namespace infotech\reference\models\dromru;

use Yii;
use infotech\reference\models\ActiveRecord;

/**
 * This is the model class for table "dromru_model_generation_map".
 *
 * @property int $dromru_model_id ID из dromru_model
 * @property int $generation_id Наш ID поколения
 *
 * @property-read Model $model
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
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dromru_model_id' => 'Dromru Model ID',
            'generation_id' => 'Generation ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'dromru_model_id']);
    }
}
