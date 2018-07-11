<?php

use yii\db\Migration;

class m170202_172611_rename_column_color_code extends Migration
{
    public function up()
    {
        $this->renameColumn('eqt_color', 'code', 'rgb');
    }

    public function down()
    {
        $this->renameColumn('eqt_color', 'rgb', 'code');
    }
}
