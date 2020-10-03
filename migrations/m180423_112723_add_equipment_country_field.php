<?php

use yii\db\Migration;

class m180423_112723_add_equipment_country_field extends Migration
{
    public function safeUp()
    {
        $this->addColumn(
            'eqt_equipment',
            'country_id',
            $this->integer()->defaultValue(null)
        );

        $this->addForeignKey(
            'equipment-country-fk',
            'eqt_equipment',
            'country_id',
            'countries',
            'id'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('equipment-country-fk', 'eqt_equipment');
        $this->dropColumn('eqt_equipment', 'country_id');
    }
}
