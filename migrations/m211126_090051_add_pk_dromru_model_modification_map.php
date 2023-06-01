<?php

use yii\db\Migration;

/**
 * Class m211126_090051_add_pk_dromru_model_modification_map
 */
class m211126_090051_add_pk_dromru_model_modification_map extends Migration
{
    public function safeUp(): void
    {
        $this->addPrimaryKey('pk', 'dromru_model_modification_map', ['dromru_model_id', 'modification_id']);
    }

    public function safeDown(): void
    {
        $this->dropPrimaryKey('pk', 'dromru_model_modification_map');
    }
}
