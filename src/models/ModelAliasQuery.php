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
    public function brand($brandId): self
    {
        return $this->andWhere([$this->tableName() . '.brand_id' => $brandId]);
    }

    /**
     * @param $status
     * @return ModelAliasQuery
     * @throws InvalidConfigException
     */
    public function status($status): self
    {
        return $this->andWhere([$this->tableName() . '.status' => $status]);
    }

    /**
     * @param $id
     * @return ModelAliasQuery
     * @throws InvalidConfigException
     */
    public function country($id)
    {
        [$tableName, $alias] = $this->getTableNameAndAlias();

        return $this->andWhere(['EXISTS', ModelAliasCountry::find()->where([
            'AND',
            $alias . '.id = ' . ModelAliasCountry::tableName() . '.model_alias_id',
            [ModelAliasCountry::tableName() . '.country_id' => $id],
        ])]);
    }
}
