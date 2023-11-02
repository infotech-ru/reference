<?php

use yii\db\Migration;

/**
 * Class m231030_010317_create_table__post_index
 */
class m231030_010317_create_table__post_index extends Migration
{
    public function safeUp()
    {
        $this->createTable('post_index', [
            'id' => $this->primaryKey(),
            'index' => $this->string(6),
            'ops_name' => $this->string(),
            'ops_type' => $this->string(30),
            'parent_index' => $this->string(6),
            'region' => $this->string(),
            'area' => $this->string(),
            'city' => $this->string(),
            'city1' => $this->string(),
            'date' => $this->date(),
        ], 'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci');
    }

    public function safeDown()
    {
        $this->dropTable('post_index');
    }
}
