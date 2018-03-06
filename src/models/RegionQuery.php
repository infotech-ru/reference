<?php

namespace infotech\reference\models;


class RegionQuery extends ActiveQuery
{
    public function name(string $name): ActiveQuery
    {
        return $this->andWhere(['like', 'name', $name]);
    }
}
