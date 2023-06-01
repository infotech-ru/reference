<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

class ModelOptionTagQuery extends ActiveQuery
{
    /**
     * @param $value
     * @return ModelOptionTagQuery
     * @throws InvalidConfigException
     */
    public function model($value)
    {
        return $this->andWhere([$this->tableName() . '.model_id' => $value]);
    }
}
