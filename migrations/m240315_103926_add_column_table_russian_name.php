<?php

use yii\db\Migration;

class m240315_103926_add_column_table_russian_name extends Migration
{
    public function safeUp()
    {
        $this->addColumn('russian_name', 'alias', $this->string(100)->after('name'));
    }

    public function safeDown()
    {
        $this->dropColumn('russian_name', 'alias');
    }
}
