<?php

namespace infotech\reference\models;


class ModelOptionTagQuery extends ActiveQuery
{
    public function model($value)
    {
        return $this->andWhere([$this->tableName().'.model_id' => $value]);
    }
}