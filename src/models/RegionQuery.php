<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

class RegionQuery extends ActiveQuery
{
    /**
     * @param string $name
     * @return ActiveQuery
     * @throws InvalidConfigException
     */
    public function name(string $name): ActiveQuery
    {
        return $this->andWhere(['like', $this->tableName() . '.name', $name]);
    }

    /**
     * @param $status
     * @return ActiveQuery
     * @throws InvalidConfigException
     */
    public function status($status): ActiveQuery
    {
        return $this->andWhere([$this->tableName() . '.status' => $status]);
    }
}
