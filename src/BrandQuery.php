<?php

namespace infotech\reference;


class BrandQuery extends ActiveQuery
{
    public function supported($value)
    {
        return $this->andWhere([$this->tableName().'.is_supported' => $value]);
    }
}