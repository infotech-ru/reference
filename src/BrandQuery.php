<?php

namespace infotech\reference;


class BrandQuery extends ActiveQuery
{
    public function isSupported($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_supported' => $value]);
    }
}