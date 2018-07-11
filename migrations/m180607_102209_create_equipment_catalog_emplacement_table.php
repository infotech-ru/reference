<?php

use yii\db\Migration;

/**
 * Handles the creation of table `equipment_catalog_emplacement`.
 */
class m180607_102209_create_equipment_catalog_emplacement_table extends Migration
{
    const TABLE_NAME = "eqt_equipment_catalog_emplacement";
    const ENGINE = 'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci';

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable(
            self::TABLE_NAME,
            [
                'catalog_emplacement_id' => $this->integer()->notNull(),
                'equipment_id' => $this->integer()->notNull(),
            ],
            self::ENGINE
        );

        $this->addPrimaryKey(
            "equipment_catalog_emplacement-pk",
            self::TABLE_NAME,
            ['catalog_emplacement_id', 'equipment_id']
        );

        $this->addForeignKey(
            "equipment_catalog_emplacement-catalog_emplacement-fk",
            self::TABLE_NAME,
            "catalog_emplacement_id",
            'eqt_catalog_emplacement',
            'id'
        );

        $this->addForeignKey(
            'equipment_catalog_emplacement-equipment-fk',
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
        $this->dropTable(self::TABLE_NAME);
    }
}
