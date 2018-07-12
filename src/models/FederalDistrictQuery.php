<?php

namespace infotech\reference\models;


class FederalDistrictQuery extends ActiveQuery
{
    public function status($status)
    {
        return $this->andWhere([$this->tableName().'.status' => $status]);
    }
}