<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%credit_program_equipment}}`.
 */
class m210425_185832_create_credit_program_equipment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('credit_program_equipment', [
            'id' => $this->primaryKey(),
            'program_id' => $this->integer()->notNull(),
            'equipment_id' => $this->integer()->notNull(),
        ], 'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci');

        $this->addForeignKey(
            'fk_credit_program_equipment_program',
            'credit_program_equipment',
            'program_id',
            'credit_program',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_credit_program_equipment_equipment',
            'credit_program_equipment',
            'equipment_id',
            'eqt_equipment',
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
        $this->dropForeignKey('fk_credit_program_equipment_program', 'credit_program_equipment');
        $this->dropForeignKey('fk_credit_program_equipment_equipment', 'credit_program_equipment');
        $this->dropTable('credit_program_equipment');
    }
}
