<?php

namespace infotech\reference;

class SerieQuery extends ActiveQuery
{
    public function isRecent($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_recent' => $value]);
    }

    public function isVisible($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_visible' => $value]);
    }
}