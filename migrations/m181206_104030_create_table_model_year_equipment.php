<?php

use yii\db\Migration;

/**
 * Class m181206_104030_create_table_model_year_equipment
 */
class m181206_104030_create_table_model_year_equipment extends Migration
{
    public function safeUp()
    {
        $this->createTable('model_year_equipment', [
            'model_year_id' => $this->integer()->notNull(),
            'equipment_id' => $this->integer()->notNull(),
            'PRIMARY KEY(model_year_id, equipment_id)',
        ], 'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci');
        $this->addForeignKey('fk_model_year_equipment_model_year_id', 'model_year_equipment', 'model_year_id', 'model_year', 'id');
        $this->addForeignKey('fk_model_year_equipment_equipment_id', 'model_year_equipment', 'equipment_id', 'eqt_equipment', 'id');
    }

    public function safeDown()
    {
        $this->dropTable('model_year_equipment');
    }
}
