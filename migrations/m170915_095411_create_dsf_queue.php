<?php

use yii\db\Migration;

class m170915_095411_create_dsf_queue extends Migration
{
    public function safeUp()
    {
        $this->createTable('dsf_queue', [
            'id' => $this->primaryKey(),
            'channel' => $this->string(255)->notNull(),
            'job' => $this->binary()->notNull(),
            'pushed_at' => $this->integer()->notNull(),
            'ttr' => $this->integer()->notNull(),
            'delay' => $this->integer()->notNull()->defaultValue(0),
            'priority' => $this->integer()->notNull()->unsigned()->defaultValue(1024),
            'reserved_at' => $this->integer(),
            'attempt' => $this->integer(),
            'done_at' => $this->integer(),
        ], 'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci');

        $this->createIndex('channel', 'dsf_queue', 'channel');
        $this->createIndex('reserved_at', 'dsf_queue', 'reserved_at');
        $this->createIndex('priority', 'dsf_queue', 'priority');
    }

    public function safeDown()
    {
        $this->dropTable('dsf_queue');
    }
}
