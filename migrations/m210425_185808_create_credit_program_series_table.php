<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%credit_program_series}}`.
 */
class m210425_185808_create_credit_program_series_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('credit_program_series', [
            'id' => $this->primaryKey(),
            'program_id' => $this->integer()->notNull(),
            'series_id' => $this->integer()->notNull(),
        ], 'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci');

        $this->addForeignKey(
            'fk_credit_program_series_program',
            'credit_program_series',
            'program_id',
            'credit_program',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_credit_program_series_series',
            'credit_program_series',
            'series_id',
            'car_serie',
            'id_car_serie',
            'RESTRICT',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_credit_program_series_program', 'credit_program_series');
        $this->dropForeignKey('fk_credit_program_series_series', 'credit_program_series');
        $this->dropTable('credit_program_series');
    }
}
