<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

class ColorQuery extends ActiveQuery
{
    /**
     * @param $modelId
     * @return ColorQuery
     * @throws InvalidConfigException
     */
    public function model($modelId): self
    {
        return $this->andWhere([$this->tableName() . '.model_id' => $modelId]);
    }

    /**
     * @param $serieId
     * @return ColorQuery
     * @throws InvalidConfigException
     */
    public function serie($serieId): self
    {
        $catalogEmplacementTbl = CatalogEmplacement::tableName();

        $query = CatalogEmplacement::find()
            ->andWhere("{$catalogEmplacementTbl}.color_id={$this->tableName()}.id")
            ->andWhere(["{$catalogEmplacementTbl}.serie_id" => $serieId]);

        return $this->andWhere(['EXISTS', $query]);
    }
}
