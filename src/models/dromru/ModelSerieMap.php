<?php

namespace infotech\reference\models\dromru;

use Yii;
use infotech\reference\models\ActiveRecord;

/**
 * This is the model class for table "dromru_model_serie_map".
 *
 * @property int $dromru_model_id ID из dromru_model
 * @property int $serie_id Наш ID серии
 *
 * @property-read Model $model
 *
 */
class ModelSerieMap extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'autocrm.dromru_model_serie_map';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dromru_model_id', 'serie_id'], 'required'],
            [['dromru_model_id', 'serie_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dromru_model_id' => 'Dromru Model ID',
            'serie_id' => 'Serie ID',
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
