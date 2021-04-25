<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%credit_program_brand}}`.
 */
class m210425_185732_create_credit_program_brand_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('credit_program_brand', [
            'id' => $this->primaryKey(),
            'program_id' => $this->integer()->notNull(),
            'brand_id' => $this->integer()->unsigned()->notNull(),
        ], 'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci');

        $this->addForeignKey(
            'fk_credit_program_brand_program',
            'credit_program_brand',
            'program_id',
            'credit_program',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_credit_program_brand_brand',
            'credit_program_brand',
            'brand_id',
            'brands',
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
        $this->dropForeignKey('fk_credit_program_brand_program', 'credit_program_brand');
        $this->dropForeignKey('fk_credit_program_brand_brand', 'credit_program_brand');
        $this->dropTable('credit_program_brand');
    }
}
