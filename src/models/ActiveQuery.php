<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;
use yii\di\Instance;

abstract class ActiveQuery extends \yii\db\ActiveQuery
{
    /**
     * @return string
     * @throws InvalidConfigException
     */
    protected function tableName(): string
    {
        /** @var ActiveRecord $modelClass */
        $modelClass = Instance::ensure($this->modelClass, ActiveRecord::class);

        return $modelClass::tableName();
    }
}
