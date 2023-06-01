<?php

use yii\db\Migration;

class m170307_110206_add_column_equipment_origin_id extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn('eqt_equipment', 'origin_id', $this->integer());
    }

    public function safeDown(): void
    {
        $this->dropColumn('eqt_equipment', 'origin_id');
    }
}
