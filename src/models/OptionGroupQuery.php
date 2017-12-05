<?php

namespace infotech\reference\models;


class OptionGroupQuery extends ActiveQuery
{
    public function brand($value)
    {
        return $this->andWhere([$this->tableName().'.brand_id' => $value]);
    }
}