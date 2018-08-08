<?php

use yii\db\Migration;

/**
 * Class m180730_095644_create_table_model_video
 */
class m180730_095644_create_table_model_video extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'model_video',
            [
                'id' => $this->primaryKey(),
                'model_id' => $this->integer()->notNull(),
                'type' => $this->smallInteger()->notNull(),
                'url' => $this->string()->notNull(),
                'priority' => $this->smallInteger()->notNull(),
                'status' => $this->smallInteger()->notNull(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
        $this->addForeignKey('fk_model_video_model_id', 'model_video', 'model_id', 'models', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('model_video');
    }
}
