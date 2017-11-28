<?php

namespace infotech\reference\models;


class GenerationQuery extends ActiveQuery
{
    public function isVisible($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_visible' => $value]);
    }

    public function isRecent($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_recent' => $value]);
    }

    public function model($modelId)
    {
        return $this->andWhere([$this->tableName().'.model_id' => $modelId]);
    }
}