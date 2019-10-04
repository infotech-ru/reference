<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

class BrandQuery extends ActiveQuery
{
    /**
     * @param bool $value
     * @return BrandQuery
     * @throws InvalidConfigException
     */
    public function isSupported($value = true)
    {
        return $this->andWhere([$this->tableName() . '.is_supported' => $value]);
    }
}
