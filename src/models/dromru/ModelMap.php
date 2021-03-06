<?php

namespace infotech\reference\models\dromru;

use infotech\reference\models\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "dromru_model_map".
 *
 * @property int $dromru_model_id ID из dromru_model
 * @property int $model_id Наш ID модели
 *
 * @property Model $dromruModel
 * @property \infotech\reference\models\Model $model
 */
class ModelMap extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dromru_model_map';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dromru_model_id', 'model_id'], 'required'],
            [['dromru_model_id', 'model_id'], 'integer'],
            ['dromru_model_id', 'exist', 'targetRelation' => 'dromruModel'],
            ['model_id', 'exist', 'targetRelation' => 'model'],
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getDromruModel()
    {
        return $this->hasOne(Model::class, ['id' => 'dromru_model_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(\infotech\reference\models\Model::class, ['id' => 'model_id']);
    }
}
