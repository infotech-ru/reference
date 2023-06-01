<?php

use yii\db\Migration;

class m170301_113929_alter_name_column_in_option_table extends Migration
{
    public function safeUp(): void
    {
        $this->alterColumn(
            'eqt_option',
            'name',
            $this->string(510)->notNull()
        );
    }

    public function safeDown(): void
    {
        $this->alterColumn(
            'eqt_option',
            'name',
            $this->string()->notNull()
        );
    }
}
