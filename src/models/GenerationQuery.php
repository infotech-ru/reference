<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;
use yii\db\Expression;

class GenerationQuery extends ActiveQuery
{
    /**
     * @param bool $value
     * @return GenerationQuery
     * @throws InvalidConfigException
     */
    public function isVisible($value = true)
    {
        return $this->andWhere([$this->tableName() . '.is_visible' => $value]);
    }

    /**
     * @param bool $value
     * @return GenerationQuery
     * @throws InvalidConfigException
     */
    public function isRecent($value = true)
    {
        return $this->andWhere([$this->tableName() . '.is_recent' => $value]);
    }

    /**
     * @param $modelId
     * @return GenerationQuery
     * @throws InvalidConfigException
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
     * @throws InvalidConfigException
     */
    public function year($year)
    {
        if ((int)$year) {
            $tbl = $this->tableName();

            $this->andWhere([
                'AND',
                ":year >= $tbl.year_begin",
                [
                    'OR',
                    ":year <= $tbl.year_end",
                    "$tbl.year_end IS NULL",
                ],
            ]);

            $this->params[':year'] = (int)$year;
        }

        return $this;
    }
}
