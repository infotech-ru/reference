<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

class ModelClassQuery extends ActiveQuery
{
    /**
     * @param $value
     * @return ModelClassQuery
     * @throws InvalidConfigException
     */
    public function status($value): self
    {
        return $this->andWhere([$this->tableName() . '.status' => $value]);
    }
}
