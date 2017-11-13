<?php

namespace infotech\reference\models;

class CatalogImageQuery extends ActiveQuery
{
    public function isMain($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_main' => $value]);
    }

    public function isSerieMain($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_serie_main' => $value]);
    }
}