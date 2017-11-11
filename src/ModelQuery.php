<?php

namespace infotech\reference;

class ModelQuery extends ActiveQuery
{
    public function recent($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_recent' => $value]);
    }

    public function deleted($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_deleted' => $value]);
    }
}