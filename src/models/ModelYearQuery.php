<?php

namespace infotech\reference\models;


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

    public function model($value)
    {
        return $this->andWhere([$this->tableName().'.model_id' => $value]);
    }
}