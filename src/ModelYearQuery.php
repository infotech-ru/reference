<?php

namespace infotech\reference;


class ModelYearQuery extends ActiveQuery
{
    public function recent($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_recent' => $value]);
    }

    public function default($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_default' => $value]);
    }
}