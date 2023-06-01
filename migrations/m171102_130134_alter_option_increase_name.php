<?php

use yii\db\Migration;

class m171102_130134_alter_option_increase_name extends Migration
{
    public function safeUp()
    {
        $this->alterColumn(
            'eqt_option',
            'name',
            $this->string(1500)->notNull()
        );
    }

    public function safeDown()
    {
        $this->alterColumn(
            'eqt_option',
            'name',
            $this->string(510)->notNull()
        );
    }
}
