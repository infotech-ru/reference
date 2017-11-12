<?php

namespace infotech\reference;

class ImageQuery extends ActiveQuery
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