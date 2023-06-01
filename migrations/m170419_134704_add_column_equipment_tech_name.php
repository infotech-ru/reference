<?php

use yii\db\Migration;

class m170419_134704_add_column_equipment_tech_name extends Migration
{
    public function up()
    {
        $this->addColumn('eqt_equipment', 'tech_name', $this->string()->after('archive_name'));
    }

    public function down()
    {
        $this->dropColumn('eqt_equipment', 'tech_name');
    }
}
