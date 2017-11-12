<?php

namespace infotech\reference;


class EmplacementQuery extends ActiveQuery
{
    public function isMain($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_main' => $value]);
    }
}