<?php

namespace infotech\reference\models;

class SerieQuery extends ActiveQuery
{
    public function isRecent($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_recent' => $value]);
    }

    public function isVisible($value = true)
    {
        return $this->andWhere([$this->tableName().'.is_visible' => $value]);
    }

    public function generation($generationId)
    {
        return $this->andWhere([$this->tableName().'.id_car_generation' => $generationId]);
    }

    public function model($modelId)
    {
        return $this->andWhere([$this->tableName().'.model_id' => $modelId]);
    }
}