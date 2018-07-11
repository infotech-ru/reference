<?php

use yii\db\Migration;

/**
 * Handles the creation of table `country_equipment`.
 */
class m180507_134850_create_country_equipment_table extends Migration
{
    const TABLE_NAME = "eqt_equipment_country";
    const ENGINE = 'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci';

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable(
            self::TABLE_NAME,
            [
                'country_id' => $this->integer()->notNull(),
                'equipment_id' => $this->integer()->notNull(),
            ],
            self::ENGINE
        );

        $this->addPrimaryKey("equipment_country-pk", self::TABLE_NAME, ['country_id', 'equipment_id']);

        $this->addForeignKey(
            "equipment_country-country-fk",
            self::TABLE_NAME,
            "country_id",
            'countries',
            'id'
        );

        $this->addForeignKey(
            'equipment_country-equipment-fk',
            self::TABLE_NAME,
            'equipment_id',
            'eqt_equipment',
            'id'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey('equipment_country-equipment-fk', self::TABLE_NAME);
        $this->dropForeignKey('equipment_country-country-fk', self::TABLE_NAME);
        $this->dropTable(self::TABLE_NAME);
    }
}
