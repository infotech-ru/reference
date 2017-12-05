<?php

namespace infotech\reference\models;


class ColorQuery extends ActiveQuery
{
    public function model($modelId)
    {
        return $this->andWhere([$this->tableName().'.model_id' => $modelId]);
    }
}