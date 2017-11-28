<?php

namespace infotech\reference\models;


class SkinQuery extends ActiveQuery
{
    public function model($modelId)
    {
        return $this->andWhere([$this->tableName().'.model_id' => $modelId]);
    }
}