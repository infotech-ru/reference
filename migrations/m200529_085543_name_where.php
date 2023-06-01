<?php

use yii\db\Migration;

class m200529_085543_name_where extends Migration
{
    public function safeUp()
    {
        $this->addColumn('cities', 'name_where', $this->string()->after('name'));
    }

    public function safeDown()
    {
        $this->dropColumn('cities', 'name_where');
    }
}
