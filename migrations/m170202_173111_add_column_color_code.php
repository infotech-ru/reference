<?php

use yii\db\Migration;

class m170202_173111_add_column_color_code extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn('eqt_color', 'code', $this->string()->after('id'));
    }

    public function safeDown(): void
    {
        $this->dropColumn('eqt_color', 'code');
    }
}
