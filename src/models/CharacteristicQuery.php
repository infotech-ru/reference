<?php

namespace infotech\reference\models;


class CharacteristicQuery extends ActiveQuery
{
    public function isMain($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_main' => $value]);
    }
}