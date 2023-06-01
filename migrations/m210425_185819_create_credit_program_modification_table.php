<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%credit_program_modification}}`.
 */
class m210425_185819_create_credit_program_modification_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('credit_program_modification', [
            'id' => $this->primaryKey(),
            'program_id' => $this->integer()->notNull(),
            'modification_id' => $this->integer()->notNull(),
        ], 'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci');

        $this->addForeignKey(
            'fk_credit_program_modification_program',
            'credit_program_modification',
            'program_id',
            'credit_program',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_credit_program_modification_modification',
            'credit_program_modification',
            'modification_id',
            'car_modification',
            'id_car_modification',
            'RESTRICT',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_credit_program_modification_program', 'credit_program_modification');
        $this->dropForeignKey('fk_credit_program_modification_modification', 'credit_program_modification');
        $this->dropTable('credit_program_modification');
    }
}
