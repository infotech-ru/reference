<?php

namespace infotech\reference\models;


class ModificationQuery extends ActiveQuery
{
    public function isRecent($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_recent' => $value]);
    }

    public function isVisible($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_visible' => $value]);
    }

    public function isDeleted($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_deleted' => $value]);
    }
}