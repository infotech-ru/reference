<?php

use yii\db\Migration;

/**
 * Handles the creation of table `catalog_emplacement`.
 */
class m170123_055708_create_catalog_emplacement_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp(): void
    {
        $this->createTable(
            'eqt_catalog_emplacement',
            [
                'id' => $this->primaryKey(),
                'model_id' => $this->integer()->notNull(),
                'serie_id' => $this->integer()->notNull(),
                'color_id' => $this->integer()->notNull(),
                'equipment_id' => $this->integer()->defaultValue(null),
                'is_main' => $this->boolean()->notNull()->defaultValue(0),
                'created_at' => $this->dateTime()->notNull(),
                'updated_at' => $this->dateTime(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );

        $this->addForeignKey(
            'eqt_fk_catalog_emplacement_model',
            'eqt_catalog_emplacement',
            'model_id',
            'models',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'eqt_fk_catalog_emplacement_serie',
            'eqt_catalog_emplacement',
            'serie_id',
            'car_serie',
            'id_car_serie',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'eqt_fk_catalog_emplacement_color',
            'eqt_catalog_emplacement',
            'color_id',
            'eqt_color',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'eqt_fk_catalog_emplacement_equipment',
            'eqt_catalog_emplacement',
            'equipment_id',
            'eqt_equipment',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): void
    {
        $this->dropForeignKey('eqt_fk_catalog_emplacement_equipment', 'eqt_catalog_emplacement');
        $this->dropForeignKey('eqt_fk_catalog_emplacement_color', 'eqt_catalog_emplacement');
        $this->dropForeignKey('eqt_fk_catalog_emplacement_serie', 'eqt_catalog_emplacement');
        $this->dropForeignKey('eqt_fk_catalog_emplacement_model', 'eqt_catalog_emplacement');
        $this->dropTable('eqt_catalog_emplacement');
    }
}
