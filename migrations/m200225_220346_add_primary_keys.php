<?php

use yii\db\Migration;

/**
 * Class m200225_220346_add_primary_keys
 */
class m200225_220346_add_primary_keys extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk', 'currency', 'number_code');
        $this->addPrimaryKey('pk', 'okopf', 'code');
        $this->addPrimaryKey('pk', 'okved', 'code');
        $this->addPrimaryKey('pk', 'order_types', ['brand_id', 'code']);
        $this->addPrimaryKey('pk', 'statuses', ['brand_id', 'status_code']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk', 'currency');
        $this->dropPrimaryKey('pk', 'okopf');
        $this->dropPrimaryKey('pk', 'okved');
        $this->dropPrimaryKey('pk', 'order_types');
        $this->dropPrimaryKey('pk', 'statuses');
    }
}
