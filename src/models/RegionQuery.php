<?php

namespace infotech\reference\models;


class RegionQuery extends ActiveQuery
{
    public function name(string $name): ActiveQuery
    {
        return $this->andWhere(['like', $this->tableName().'.name', $name]);
    }

    public function status($status): ActiveQuery
    {
        return $this->andWhere([$this->tableName().'.status' => $status]);
    }
}
