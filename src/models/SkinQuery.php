<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

class SkinQuery extends ActiveQuery
{
    /**
     * @param $modelId
     * @return SkinQuery
     * @throws InvalidConfigException
     */
    public function model($modelId)
    {
        return $this->andWhere([$this->tableName() . '.model_id' => $modelId]);
    }

    /**
     * @param $serieId
     * @return SkinQuery
     * @throws InvalidConfigException
     */
    public function serie($serieId)
    {
        $skinSerieTbl = SkinSerie::tableName();

        $query = SkinSerie::find()
            ->andWhere("{$skinSerieTbl}.skin_id={$this->tableName()}.id")
            ->andWhere(["{$skinSerieTbl}.serie_id" => $serieId]);

        return $this->andWhere(['EXISTS', $query]);
    }
}
