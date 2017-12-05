<?php

namespace infotech\reference\models;


use yii\db\Expression;

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
        $serie = Serie::find()
            ->select('id_car_serie')
            ->model($modelId)
            ->generation(new Expression($this->tableName().'.id_car_generation'));

        return $this->andWhere(['OR', [$this->tableName().'.model_id' => $modelId], ['EXISTS', $serie]]);
    }
}