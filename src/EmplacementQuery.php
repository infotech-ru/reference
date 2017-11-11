<?php

namespace infotech\reference;


class EmplacementQuery extends ActiveQuery
{
    public function main($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_main' => $value]);
    }
}