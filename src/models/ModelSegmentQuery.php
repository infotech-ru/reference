<?php

namespace infotech\reference\models;


class ModelSegmentQuery extends ActiveQuery
{
    public function status($value)
    {
        return $this->andWhere([$this->tableName().'.status' => $value]);
    }
}