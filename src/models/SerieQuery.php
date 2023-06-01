<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

class SerieQuery extends ActiveQuery
{
    /**
     * @param bool $value
     * @return SerieQuery
     * @throws InvalidConfigException
     */
    public function isRecent($value = true): self
    {
        return $this->andWhere([$this->tableName() . '.is_recent' => $value]);
    }

    public function isVisible($value = true): self
    {
        return $this->andWhere([$this->tableName() . '.is_visible' => $value]);
    }

    /**
     * @param $generationId
     * @return SerieQuery
     * @throws InvalidConfigException
     */
    public function generation($generationId): self
    {
        return $this->andWhere([$this->tableName() . '.id_car_generation' => $generationId]);
    }

    /**
     * @param $modelId
     * @return SerieQuery
     * @throws InvalidConfigException
     */
    public function model($modelId): self
    {
        return $this->andWhere([$this->tableName() . '.model_id' => $modelId]);
    }
}
