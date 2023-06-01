<?php

use yii\db\Migration;

/**
 * Handles the creation of table `equipment_catalog_emplacement`.
 */
class m180607_102209_create_equipment_catalog_emplacement_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp(): void
    {
        $this->createTable(
            'eqt_equipment_catalog_emplacement',
            [
                'catalog_emplacement_id' => $this->integer()->notNull(),
                'equipment_id' => $this->integer()->notNull(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );

        $this->addPrimaryKey(
            'equipment_catalog_emplacement-pk',
            'eqt_equipment_catalog_emplacement',
            ['catalog_emplacement_id', 'equipment_id']
        );

        $this->addForeignKey(
            'equipment_catalog_emplacement-catalog_emplacement-fk',
            'eqt_equipment_catalog_emplacement',
            'catalog_emplacement_id',
            'eqt_catalog_emplacement',
            'id'
        );

        $this->addForeignKey(
            'equipment_catalog_emplacement-equipment-fk',
            'eqt_equipment_catalog_emplacement',
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
        $this->dropTable('eqt_equipment_catalog_emplacement');
    }
}
