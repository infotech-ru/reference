<?php

namespace infotech\reference\models;


class EquipmentQuery extends ActiveQuery
{
    public function serie($value)
    {
        return $this->andWhere([$this->tableName().'.series_id' => $value]);
    }

    public function status($value)
    {
        return $this->andWhere([$this->tableName().'.status' => $value]);
    }
}