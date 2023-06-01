<?php

use yii\db\Migration;

class m170202_173111_add_column_color_code extends Migration
{
    public function up()
    {
        $this->addColumn('eqt_color', 'code', $this->string()->after('id'));
    }

    public function down()
    {
        $this->dropColumn('eqt_color', 'code');
    }
}
