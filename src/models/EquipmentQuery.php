<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

class EquipmentQuery extends ActiveQuery
{
    /**
     * @param $value
     * @return EquipmentQuery
     * @throws InvalidConfigException
     */
    public function serie($value)
    {
        return $this->andWhere([$this->tableName() . '.series_id' => $value]);
    }

    /**
     * @param $value
     * @return EquipmentQuery
     * @throws InvalidConfigException
     */
    public function status($value)
    {
        return $this->andWhere([$this->tableName() . '.status' => $value]);
    }
}
