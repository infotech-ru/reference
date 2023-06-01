<?php

use yii\db\Migration;

/**
 * Handles the creation of table `country_equipment`.
 */
class m180507_134850_create_country_equipment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp(): void
    {
        $this->createTable(
            'eqt_equipment_country',
            [
                'country_id' => $this->integer()->notNull(),
                'equipment_id' => $this->integer()->notNull(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );

        $this->addPrimaryKey('equipment_country-pk', 'eqt_equipment_country', ['country_id', 'equipment_id']);

        $this->addForeignKey(
            'equipment_country-country-fk',
            'eqt_equipment_country',
            'country_id',
            'countries',
            'id'
        );

        $this->addForeignKey(
            'equipment_country-equipment-fk',
            'eqt_equipment_country',
            'equipment_id',
            'eqt_equipment',
            'id'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): void
    {
        $this->dropForeignKey('equipment_country-equipment-fk', 'eqt_equipment_country');
        $this->dropForeignKey('equipment_country-country-fk', 'eqt_equipment_country');
        $this->dropTable('eqt_equipment_country');
    }
}
