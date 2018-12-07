<?php

use yii\db\Migration;

/**
 * Class m181207_075512_create_table_modification_equipment
 */
class m181207_075512_create_table_modification_equipment extends Migration
{
    public function safeUp()
    {
        $this->createTable('modification_equipment', [
            'modification_id' => $this->integer()->notNull(),
            'equipment_id' => $this->integer()->notNull(),
            'PRIMARY KEY(modification_id, equipment_id)',
        ], 'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci');
        $this->addForeignKey('fk_modification_equipment_modification_id', 'modification_equipment', 'modification_id', 'car_modification', 'id_car_modification');
        $this->addForeignKey('fk_modification_equipment_equipment_id', 'modification_equipment', 'equipment_id', 'eqt_equipment', 'id');
    }

    public function safeDown()
    {
        $this->dropTable('modification_equipment');
    }
}
