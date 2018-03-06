<?php

namespace infotech\reference\models;


class CountryQuery extends ActiveQuery
{
    public function name(string $name): ActiveQuery
    {
        return $this->andWhere(['like', 'name', $name]);
    }
}
