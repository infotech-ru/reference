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
}
