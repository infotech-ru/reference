<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

class ModelSegmentQuery extends ActiveQuery
{
    /**
     * @param $value
     * @return ModelSegmentQuery
     * @throws InvalidConfigException
     */
    public function status($value): self
    {
        return $this->andWhere([$this->tableName() . '.status' => $value]);
    }
}
