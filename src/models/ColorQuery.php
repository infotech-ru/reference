<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

class ColorQuery extends ActiveQuery
{
    /**
     * @param $modelId
     * @return ColorQuery
     * @throws InvalidConfigException
     */
    public function model($modelId)
    {
        return $this->andWhere([$this->tableName() . '.model_id' => $modelId]);
    }
}
