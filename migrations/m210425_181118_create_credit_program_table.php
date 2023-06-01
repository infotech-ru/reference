<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%credit_program}}`.
 */
class m210425_181118_create_credit_program_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('credit_program', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'period_min' => $this->smallInteger()->notNull(),
            'period_max' => $this->smallInteger()->notNull(),
            'initial_fee_min' => $this->decimal(5, 2)->notNull(),
            'initial_fee_max' => $this->decimal(5, 2)->notNull(),
            'period_step' => $this->smallInteger()->notNull(),
            'bank_id' => $this->integer()->notNull(),
            'matrix_json' => $this->text(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
        ], 'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci');

        $this->addForeignKey(
            'fk_credit_program_bank',
            'credit_program',
            'bank_id',
            'credit_bank',
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
        $this->dropForeignKey('fk_credit_program_bank', 'credit_program');
        $this->dropTable('credit_program');
    }
}
