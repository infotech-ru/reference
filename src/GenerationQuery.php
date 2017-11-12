<?php

namespace infotech\reference;


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
}