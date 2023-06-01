<?php

use yii\db\Migration;

class m170301_112103_alter_name_column_model_option_table extends Migration
{
    public function safeUp(): void
    {
        $this->alterColumn(
            'eqt_model_option',
            'name',
            $this->string(510)->notNull()
        );
    }

    public function safeDown(): void
    {
        $this->alterColumn(
            'eqt_model_option',
            'name',
            $this->string()->notNull()
        );
    }
}
