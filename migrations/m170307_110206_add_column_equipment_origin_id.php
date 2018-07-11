<?php

use yii\db\Migration;

class m170307_110206_add_column_equipment_origin_id extends Migration
{
    public function up()
    {
        $this->addColumn('eqt_equipment', 'origin_id', $this->integer());
    }

    public function down()
    {
        $this->dropColumn('eqt_equipment', 'origin_id');
    }
}
