<?php

namespace infotech\reference\models\dromru;

use infotech\reference\models\Serie;
use infotech\reference\models\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "dromru_model_serie_map".
 *
 * @property int $dromru_model_id ID из dromru_model
 * @property int $serie_id Наш ID серии
 *
 * @property-read Model $model
 * @property-read Serie $serie
 *
 */
class ModelSerieMap extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dromru_model_serie_map';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dromru_model_id', 'serie_id'], 'required'],
            [['dromru_model_id', 'serie_id'], 'integer'],
            ['dromru_model_id', 'exist', 'targetRelation' => 'model'],
            ['serie_id', 'exist', 'targetRelation' => 'serie'],
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
    public function getSerie()
    {
        return $this->hasOne(Serie::class, ['id_car_serie' => 'serie_id']);
    }
}
