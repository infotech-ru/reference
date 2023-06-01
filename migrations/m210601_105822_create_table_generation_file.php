<?php

use yii\db\Migration;

/**
 * Class m210601_105822_create_table_generation_file
 */
class m210601_105822_create_table_generation_file extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable(
            'generation_file',
            [
                'id' => $this->primaryKey(),
                'generation_id' => $this->integer()->notNull(),
                'upload_id' => $this->integer()->notNull(),
                'type' => $this->tinyInteger()->notNull(),
                'name' => $this->string()->notNull(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
        $this->addForeignKey(
            'generation_file_generation_id',
            'generation_file',
            'generation_id',
            'car_generation',
            'id_car_generation'
        );
        $this->addForeignKey('generation_file_upload_id', 'generation_file', 'upload_id', 'dsf_upload', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('generation_file');
    }
}
