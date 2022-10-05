<?php

use yii\db\Migration;

class m221005_133405_add_columns_table_russian_name extends Migration
{
    public function safeUp()
    {
        $this->addColumn('russian_name', 'status', $this->tinyInteger());
        $this->addColumn('russian_name', 'created_by', $this->integer());
        $this->addColumn('russian_name', 'updated_by', $this->integer());
        $this->addColumn('russian_name', 'created_at', $this->dateTime());
        $this->addColumn('russian_name', 'updated_at', $this->dateTime());
    }

    public function safeDown()
    {
        $this->dropColumn('russian_name', 'updated_at');
        $this->dropColumn('russian_name', 'created_at');
        $this->dropColumn('russian_name', 'updated_by');
        $this->dropColumn('russian_name', 'updated_at');
        $this->dropColumn('russian_name', 'status');
    }
}
