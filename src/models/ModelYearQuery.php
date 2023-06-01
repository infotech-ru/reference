<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

class ModelYearQuery extends ActiveQuery
{
    /**
     * @param bool $value
     * @return ModelYearQuery
     * @throws InvalidConfigException
     */
    public function isRecent($value = true): self
    {
        return $this->andWhere([$this->tableName() . '.is_recent' => $value]);
    }

    /**
     * @param bool $value
     * @return ModelYearQuery
     * @throws InvalidConfigException
     */
    public function isDefault($value = true): self
    {
        return $this->andWhere([$this->tableName() . '.is_default' => $value]);
    }

    /**
     * @param $value
     * @return ModelYearQuery
     * @throws InvalidConfigException
     */
    public function model($value): self
    {
        return $this->andWhere([$this->tableName() . '.model_id' => $value]);
    }
}
