<?php

use yii\db\Migration;

/**
 * Class m180709_122052_create_table_model_segment
 */
class m180709_122052_create_table_model_segment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'model_segment',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                'status' => $this->smallInteger()->notNull(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('model_segment');
    }
}
