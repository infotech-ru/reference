<?php

namespace infotech\reference;


class GenerationQuery extends ActiveQuery
{
    public function visible($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_visible' => $value]);
    }

    public function recent($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_recent' => $value]);
    }
}