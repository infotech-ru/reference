<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

class FederalDistrictQuery extends ActiveQuery
{
    /**
     * @param $status
     * @return FederalDistrictQuery
     * @throws InvalidConfigException
     */
    public function status($status): self
    {
        return $this->andWhere([$this->tableName() . '.status' => $status]);
    }
}
