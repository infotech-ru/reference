<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%credit_program_model}}`.
 */
class m210425_185743_create_credit_program_model_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('credit_program_model', [
            'id' => $this->primaryKey(),
            'program_id' => $this->integer()->notNull(),
            'model_id' => $this->integer()->notNull(),
        ], 'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci');

        $this->addForeignKey(
            'fk_credit_program_model_program',
            'credit_program_model',
            'program_id',
            'credit_program',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_credit_program_model_model',
            'credit_program_model',
            'model_id',
            'models',
            'id',
            'RESTRICT',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_credit_program_model_program', 'credit_program_model');
        $this->dropForeignKey('fk_credit_program_model_model', 'credit_program_model');
        $this->dropTable('credit_program_model');
    }
}
