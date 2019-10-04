<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

class CatalogEmplacementQuery extends ActiveQuery
{
    /**
     * @param bool $value
     * @return CatalogEmplacementQuery
     * @throws InvalidConfigException
     */
    public function isMain($value = true)
    {
        return $this->andWhere([$this->tableName() . '.is_main' => $value]);
    }
}
