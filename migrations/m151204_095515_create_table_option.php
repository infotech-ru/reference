<?php

use yii\db\Migration;

class m151204_095515_create_table_option extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'eqt_option',
            [
                'id' => $this->primaryKey(),
                'equipment_id' => $this->integer()->notNull(),
                'name' => $this->string()->notNull(),
                'created_at' => $this->dateTime()->notNull(),
                'updated_at' => $this->dateTime(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
        $this->addForeignKey(
            'eqt_fk_option_equipment',
            'eqt_option',
            'equipment_id',
            'eqt_equipment',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('eqt_fk_option_equipment', 'eqt_option');
        $this->dropTable('eqt_option');
    }
}
