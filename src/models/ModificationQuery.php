<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

class ModificationQuery extends ActiveQuery
{
    /**
     * @param bool $value
     * @return ModificationQuery
     * @throws InvalidConfigException
     */
    public function isRecent($value = true): self
    {
        return $this->andWhere([$this->tableName() . '.is_recent' => $value]);
    }

    /**
     * @param bool $value
     * @return ModificationQuery
     * @throws InvalidConfigException
     */
    public function isVisible($value = true): self
    {
        return $this->andWhere([$this->tableName() . '.is_visible' => $value]);
    }

    /**
     * @param bool $value
     * @return ModificationQuery
     * @throws InvalidConfigException
     */
    public function isDeleted($value = true): self
    {
        return $this->andWhere([$this->tableName() . '.is_deleted' => $value]);
    }
}
