<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%credit_program_option}}`.
 */
class m210425_185720_create_credit_program_option_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('credit_program_option', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ], 'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('credit_program_option');
    }
}
