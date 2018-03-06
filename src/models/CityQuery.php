<?php

namespace infotech\reference\models;


class CityQuery extends ActiveQuery
{
    public function region($value)
    {
        return $this->andWhere([$this->tableName().'.region_id' => $value]);
    }

    public function name(string $name): ActiveQuery
    {
        return $this->andWhere(['like', 'name', $name]);
    }
}
