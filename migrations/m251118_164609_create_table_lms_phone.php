<?php

use yii\db\Migration;

class m251118_164609_create_table_lms_phone extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'mts_phone',
            [
                'id' => $this->primaryKey(),
                'hash' => $this->integer()->unsigned(),
                'phone' => $this->bigInteger()->notNull()->unique(),
                'dealer_id' => $this->integer()->unsigned(),
                'request_id' => $this->integer(),
                'status' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            ],
            'ENGINE=InnoDB'
        );

        $this->createIndex('idx_mts_phone_status', 'mts_phone', 'status');
        $this->createIndex('idx_mts_phone_hash_status', 'mts_phone', ['request_id', 'hash']);
        $this->createIndex('idx_mts_phone_dealer_id', 'mts_phone', 'dealer_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('mts_phone');
    }
}
