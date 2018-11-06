<?php

namespace infotech\reference\models;


class ModelAliasQuery extends ActiveQuery
{
    public function brand($brandId)
    {
        return $this->andWhere([$this->tableName().'.brand_id' => $brandId]);
    }

    public function status($status)
    {
        return $this->andWhere([$this->tableName().'.status' => $status]);
    }
}