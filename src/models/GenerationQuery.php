<?php

namespace infotech\reference\models;


use yii\db\Expression;

class GenerationQuery extends ActiveQuery
{
    /**
     * @param $value
     * @return GenerationQuery
     */
    public function isVisible($value = true)
    {
        return $this->andWhere([$this->tableName() . '.is_visible' => $value]);
    }

    /**
     * @param $value
     * @return GenerationQuery
     */
    public function isRecent($value = true)
    {
        return $this->andWhere([$this->tableName() . '.is_recent' => $value]);
    }

    /**
     * @param $modelId
     * @return GenerationQuery
     */
    public function model($modelId)
    {
        $serie = Serie::find()
            ->select('id_car_serie')
            ->model($modelId)
            ->generation(new Expression($this->tableName() . '.id_car_generation'));

        return $this->andWhere(['OR', [$this->tableName() . '.model_id' => $modelId], ['EXISTS', $serie]]);
    }

    /**
     * @param $year
     * @return GenerationQuery
     */
    public function year($year)
    {
        return $this->andFilterWhere(['>=', $this->tableName() . '.year_begin', $year])->andFilterWhere(['<=', $this->tableName() . '.year_end', $year]);
    }
}