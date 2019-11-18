<?php

use yii\db\Migration;

/**
 * Class m191118_101703_add_autodrom_mapping
 */
class m191118_101703_add_autodrom_mapping extends Migration
{
    public function safeUp()
    {
        $this->createTable('dromru_mark',[
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'brand_id' => $this->integer()->unsigned(),
        ]);
        $this->addForeignKey(
            'fk_dromru_mark_brand_id',
            'dromru_mark',
            'brand_id',
            'brands',
            'id'
        );
        
        
        $this->createTable('dromru_model',[
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'mark_id' => $this->integer(),
            'model_id' => $this->integer(),
        ]);
        $this->addForeignKey(
            'fk_dromru_model_mark_id',
            'dromru_model',
            'mark_id',
            'dromru_mark',
            'id'
        );
        $this->addForeignKey(
            'fk_dromru_model_model_id',
            'dromru_model',
            'model_id',
            'models',
            'id'
        );
        
        $this->createTable('dromru_city',[
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
        
    }
    
    public function safeDown()
    {
        $this->dropTable('dromru_mark');
        $this->dropTable('dromru_model');
        $this->dropTable('dromru_city');
    }
}
