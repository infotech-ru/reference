<?php

use yii\db\Migration;

/**
 * Class m180730_093346_create_table_model_image
 */
class m180730_093346_create_table_model_image extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'model_image',
            [
                'id' => $this->primaryKey(),
                'model_id' => $this->integer()->notNull(),
                'url' => $this->string()->notNull(),
                'category' => $this->smallInteger()->notNull(),
                'priority' => $this->smallInteger()->notNull(),
                'status' => $this->smallInteger()->notNull(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
        $this->addForeignKey('fk_model_image_model_id', 'model_image', 'model_id', 'models', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('model_image');
    }
}
