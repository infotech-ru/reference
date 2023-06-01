<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

class OptionGroupQuery extends ActiveQuery
{
    /**
     * @param $value
     * @return OptionGroupQuery
     * @throws InvalidConfigException
     */
    public function brand($value): self
    {
        return $this->andWhere([$this->tableName() . '.brand_id' => $value]);
    }
}
