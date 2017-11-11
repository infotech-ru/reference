<?php

namespace infotech\reference;


class ModificationQuery extends ActiveQuery
{
    public function recent($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_recent' => $value]);
    }

    public function visible($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_visible' => $value]);
    }

    public function deleted($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_deleted' => $value]);
    }
}