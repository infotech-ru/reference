<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

class ModelQuery extends ActiveQuery
{
    /**
     * @param bool $value
     * @return ModelQuery
     * @throws InvalidConfigException
     */
    public function isRecent($value = true)
    {
        return $this->andWhere([$this->tableName() . '.is_recent' => $value]);
    }

    /**
     * @param bool $value
     * @return ModelQuery
     * @throws InvalidConfigException
     */
    public function isDeleted($value = true)
    {
        return $this->andWhere([$this->tableName() . '.is_deleted' => $value]);
    }

    /**
     * @param $id
     * @return ModelQuery
     * @throws InvalidConfigException
     */
    public function brand($id)
    {
        return $this->andWhere([$this->tableName() . '.brand_id' => $id]);
    }

    /**
     * @param $id
     * @return ModelQuery
     * @throws InvalidConfigException
     */
    public function country($id)
    {
        return $this->andWhere(['EXISTS', ModelCountry::find()->where([
            'AND',
            $this->tableName() . '.id = ' . ModelCountry::tableName() . '.model_id',
            [ModelCountry::tableName() . '.country_id' => $id],
        ])]);
    }
}
