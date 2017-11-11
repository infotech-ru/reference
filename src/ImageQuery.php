<?php

namespace infotech\reference;

class ImageQuery extends ActiveQuery
{
    public function main($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_main' => $value]);
    }

    public function serieMain($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_serie_main' => $value]);
    }
}