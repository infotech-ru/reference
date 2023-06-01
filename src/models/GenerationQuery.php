<?php

namespace infotech\reference\models;

use yii\db\Expression;

class GenerationQuery extends ActiveQuery
{
    public function isVisible($value = true): self
    {
        return $this->andWhere([$this->tableName() . '.is_visible' => $value]);
    }

    public function isRecent($value = true): self
    {
        return $this->andWhere([$this->tableName() . '.is_recent' => $value]);
    }

    public function model($modelId): self
    {
        $serie = Serie::find()
            ->select('id_car_serie')
            ->model($modelId)
            ->generation(new Expression($this->tableName() . '.id_car_generation'));

        return $this->andWhere(['OR', [$this->tableName() . '.model_id' => $modelId], ['EXISTS', $serie]]);
    }

    public function year($year): self
    {
        $years = array_filter((array)$year, 'intval');

        if ($years) {
            $tbl = $this->tableName();
            $conditions = ['OR'];

            foreach ($years as $year) {
                $conditions[] = [
                    'AND',
                    ['<=', "$tbl.year_begin", $year],
                    [
                        'OR',
                        ['>=', "$tbl.year_end", $year],
                        "$tbl.year_end IS NULL",
                    ],
                ];
            }

            $this->andWhere($conditions);
        }

        return $this;
    }
}
