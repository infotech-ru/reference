<?php

namespace infotech\reference\models;


class ModelClassQuery extends ActiveQuery
{
    public function status($value)
    {
        return $this->andWhere([$this->tableName().'.status' => $value]);
    }
}