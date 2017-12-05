<?php

namespace infotech\reference\models;


class ModelOptionQuery extends ActiveQuery
{
    public function model($value)
    {
        return $this->andWhere([$this->tableName().'.model_id' => $value]);
    }

    public function optionGroup($value)
    {
        return $this->andWhere([$this->tableName().'.option_group_id' => $value]);
    }

    public function modelOptionTag($value)
    {
        return $this->andWhere([$this->tableName().'.model_option_tag_id' => $value]);
    }
}