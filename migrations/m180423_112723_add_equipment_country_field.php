<?php

use yii\db\Migration;

class m180423_112723_add_equipment_country_field extends Migration
{

    const TABLE_NAME = 'eqt_equipment';

    public function safeUp()
    {
        $this->addColumn(
            self::TABLE_NAME,
            'country_id',
            $this->integer()->defaultValue(null)
        );

        $this->addForeignKey(
            'equipment-country-fk',
            self::TABLE_NAME,
            'country_id',
            'countries',
            'id'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('equipment-country-fk', self::TABLE_NAME);
        $this->dropColumn(self::TABLE_NAME, 'country_id');
    }
}
