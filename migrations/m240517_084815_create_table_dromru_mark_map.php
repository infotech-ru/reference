<?php

use yii\db\Migration;

/**
 * Class m240517_084815_create_table_dromru_mark_map
 */
class m240517_084815_create_table_dromru_mark_map extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'dromru_mark_map',
            [
                'mark_id' => $this->integer(),
                'brand_id' => $this->integer(10)->unsigned()
            ]
        );

        $this->addPrimaryKey(
            'pk_dromru_mark_map',
            'dromru_mark_map',
            ['mark_id', 'brand_id']
        );

        $this->addForeignKey(
            'fk_dromru_mark_map_mark_id',
            'dromru_mark_map',
            'mark_id',
            'dromru_mark',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_dromru_mark_map_brand_id',
            'dromru_mark_map',
            'brand_id',
            'brands',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('dromru_mark_map');
    }
}
