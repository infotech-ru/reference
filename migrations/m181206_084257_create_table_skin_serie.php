<?php

use yii\db\Migration;

/**
 * Class m181206_084257_create_table_skin_serie
 */
class m181206_084257_create_table_skin_serie extends Migration
{
    public function safeUp(): void
    {
        $this->createTable('skin_serie', [
            'skin_id' => $this->integer()->notNull(),
            'serie_id' => $this->integer()->notNull(),
            'PRIMARY KEY(skin_id, serie_id)',
        ], 'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci');
        $this->addForeignKey('fk_skin_serie_skin_id', 'skin_serie', 'skin_id', 'eqt_skin', 'id');
        $this->addForeignKey('fk_skin_serie_serie_id', 'skin_serie', 'serie_id', 'car_serie', 'id_car_serie');
    }

    public function safeDown(): void
    {
        $this->dropTable('skin_serie');
    }
}
