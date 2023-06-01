<?php

use yii\db\Migration;

/**
 * Class m180709_121803_create_table_model_class
 */
class m180709_121803_create_table_model_class extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable(
            'model_class',
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
    public function safeDown(): void
    {
        $this->dropTable('model_class');
    }
}
