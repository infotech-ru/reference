<?php

use yii\db\Migration;

class m170419_134704_add_column_equipment_tech_name extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn('eqt_equipment', 'tech_name', $this->string()->after('archive_name'));
    }

    public function safeDown(): void
    {
        $this->dropColumn('eqt_equipment', 'tech_name');
    }
}
