<?php

use yii\db\Migration;

class m160829_072456_create_upload extends Migration
{
    public function safeUp(): void
    {
        $this->createTable(
            'dsf_upload',
            [
                'id' => $this->primaryKey(),
                'type' => "ENUM ('selectel') NOT NULL",
                'filename' => $this->string()->notNull(),
                'created_at' => $this->dateTime()->notNull(),
                'updated_at' => $this->dateTime(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
    }

    public function safeDown(): void
    {
        $this->dropTable('dsf_upload');
    }
}
