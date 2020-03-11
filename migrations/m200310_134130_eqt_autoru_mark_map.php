<?php

use yii\db\Migration;

class m200310_134130_eqt_autoru_mark_map extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'eqt_autoru_mark_map',
            [
                'mark_id' => $this->integer(),
                'brand_id' => $this->integer(10)->unsigned()
            ]
        );
        
        $this->addPrimaryKey(
            'pk_eqt_autoru_mark_map',
            'eqt_autoru_mark_map',
            ['mark_id', 'brand_id']
        );
        
        $this->addForeignKey(
            'fk_eqt_autoru_mark_map_mark_id',
            'eqt_autoru_mark_map',
            'mark_id',
            'eqt_autoru_mark',
            'id',
            'CASCADE',
            'CASCADE'
        );
        
        $this->addForeignKey(
            'fk_eqt_autoru_mark_map_brand_id',
            'eqt_autoru_mark_map',
            'brand_id',
            'brands',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }
    
    public function safeDown()
    {
        $this->dropTable('eqt_autoru_mark_map');
    }
}
