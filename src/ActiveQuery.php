<?php

namespace infotech\reference;


use yii\di\Instance;

abstract class ActiveQuery extends \yii\db\ActiveQuery
{
    protected function tableName(): string
    {
        /** @var ActiveRecord $modelClass */
        $modelClass = Instance::ensure($this->modelClass, ActiveRecord::class);

        return $modelClass::tableName();
    }
}