<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

class ModelAliasQuery extends ActiveQuery
{
    /**
     * @param $brandId
     * @return ModelAliasQuery
     * @throws InvalidConfigException
     */
    public function brand($brandId)
    {
        return $this->andWhere([$this->tableName() . '.brand_id' => $brandId]);
    }

    /**
     * @param $status
     * @return ModelAliasQuery
     * @throws InvalidConfigException
     */
    public function status($status)
    {
        return $this->andWhere([$this->tableName() . '.status' => $status]);
    }
}
