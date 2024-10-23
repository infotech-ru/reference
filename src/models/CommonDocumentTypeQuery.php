<?php

namespace infotech\reference\models;

class CommonDocumentTypeQuery extends ActiveQuery
{
    public function active(): CommonDocumentTypeQuery
    {
        return $this->andWhere([$this->tableName() . '.is_active' => CommonDocumentType::STATUS_ACTIVE]);
    }

}
