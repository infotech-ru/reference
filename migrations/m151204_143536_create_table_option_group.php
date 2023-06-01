<?php

use yii\db\Migration;

class m151204_143536_create_table_option_group extends Migration
{
    public function safeUp(): void
    {
        $this->createTable(
            'eqt_option_group',
            [
                'id' => $this->primaryKey(),
                'brand_id' => 'int unsigned not null',
                'name' => $this->string()->notNull(),
                'created_at' => $this->dateTime()->notNull(),
                'updated_at' => $this->dateTime(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
        $this->addForeignKey(
            'eqt_fk_option_group_brand',
            'eqt_option_group',
            'brand_id',
            'brands',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addColumn('eqt_option', 'option_group_id', $this->integer()->notNull());
        $this->addForeignKey(
            'eqt_fk_option_option_group',
            'eqt_option',
            'option_group_id',
            'eqt_option_group',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown(): void
    {
        $this->dropForeignKey('eqt_fk_option_option_group', 'eqt_option');
        $this->dropColumn('eqt_option', 'option_group_id');
        $this->dropForeignKey('eqt_fk_option_group_brand', 'eqt_option_group');
        $this->dropTable('eqt_option_group');
    }
}
