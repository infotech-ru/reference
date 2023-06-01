<?php

use yii\db\Migration;

class m170202_172611_rename_column_color_code extends Migration
{
    public function safeUp(): void
    {
        $this->renameColumn('eqt_color', 'code', 'rgb');
    }

    public function safeDown(): void
    {
        $this->renameColumn('eqt_color', 'rgb', 'code');
    }
}
