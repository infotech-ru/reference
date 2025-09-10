<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

class ModelOptionQuery extends ActiveQuery
{
    /**
     * @param $value
     * @return ModelOptionQuery
     * @throws InvalidConfigException
     */
    public function model($value)
    {
        return $this->andWhere([$this->tableName() . '.model_id' => $value]);
    }

    /**
     * @param $value
     * @return ModelOptionQuery
     * @throws InvalidConfigException
     */
    public function optionGroup($value)
    {
        return $this->andWhere([$this->tableName() . '.option_group_id' => $value]);
    }

    /**
     * @param $value
     * @return ModelOptionQuery
     * @throws InvalidConfigException
     */
    public function modelOptionTag($value)
    {
        return $this->andWhere([$this->tableName() . '.model_option_tag_id' => $value]);
    }

    /**
     * @param bool $value
     * @return ModelOptionQuery
     * @throws InvalidConfigException
     */
    public function isMain($value = true)
    {
        return $this->andWhere([$this->tableName() . '.is_main' => $value]);
    }
}
