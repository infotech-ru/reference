<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%credit_program_generation}}`.
 */
class m210425_185754_create_credit_program_generation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('credit_program_generation', [
            'id' => $this->primaryKey(),
            'program_id' => $this->integer()->notNull(),
            'generation_id' => $this->integer()->notNull(),
        ], 'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci');

        $this->addForeignKey(
            'fk_credit_program_generation_program',
            'credit_program_generation',
            'program_id',
            'credit_program',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_credit_program_generation_generation',
            'credit_program_generation',
            'generation_id',
            'car_generation',
            'id_car_generation',
            'RESTRICT',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_credit_program_generation_program', 'credit_program_generation');
        $this->dropForeignKey('fk_credit_program_generation_generation', 'credit_program_generation');
        $this->dropTable('credit_program_generation');
    }
}
