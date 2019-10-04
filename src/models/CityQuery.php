<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

class CityQuery extends ActiveQuery
{
    /**
     * @param $value
     * @return CityQuery
     * @throws InvalidConfigException
     */
    public function region($value)
    {
        return $this->andWhere([$this->tableName() . '.region_id' => $value]);
    }

    public function name(string $name): ActiveQuery
    {
        return $this->andWhere(['like', 'name', $name]);
    }
}
