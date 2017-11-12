<?php

namespace infotech\reference;


class ModelYearQuery extends ActiveQuery
{
    public function isRecent($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_recent' => $value]);
    }

    public function isDefault($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_default' => $value]);
    }
}