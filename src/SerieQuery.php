<?php

namespace infotech\reference;

class SerieQuery extends ActiveQuery
{
    public function recent($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_recent' => $value]);
    }

    public function visible($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_visible' => $value]);
    }
}