<?php

use yii\db\Migration;

class m251130_124955_alter_table_mts_phone_add_free_at extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('mts_phone', 'free_at', $this->integer());
        $this->createIndex(
            'idx_mts_phone_free_at',
            'mts_phone',
            'free_at'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx_mts_phone_free_at', 'mts_phone');
        $this->dropColumn('mts_phone', 'free_at');
    }
}
