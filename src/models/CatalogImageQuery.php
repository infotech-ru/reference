<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

class CatalogImageQuery extends ActiveQuery
{
    /**
     * @param bool $value
     * @return CatalogImageQuery
     * @throws InvalidConfigException
     */
    public function isMain($value = true)
    {
        return $this->andWhere([$this->tableName() . '.is_main' => $value]);
    }

    /**
     * @param bool $value
     * @return CatalogImageQuery
     * @throws InvalidConfigException
     */
    public function isSerieMain($value = true)
    {
        return $this->andWhere([$this->tableName() . '.is_serie_main' => $value]);
    }
}
