<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

class CharacteristicQuery extends ActiveQuery
{
    /**
     * @param bool $value
     * @return CharacteristicQuery
     * @throws InvalidConfigException
     */
    public function isMain($value = true)
    {
        return $this->andWhere([$this->tableName() . '.is_main' => $value]);
    }
}
