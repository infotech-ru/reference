<?php

use yii\db\Migration;

class m200529_085543_name_where extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn('cities', 'name_where', $this->string()->after('name'));
    }

    public function safeDown(): void
    {
        $this->dropColumn('cities', 'name_where');
    }
}
