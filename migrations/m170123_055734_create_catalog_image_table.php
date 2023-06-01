<?php

use yii\db\Migration;

/**
 * Handles the creation of table `catalog_image`.
 */
class m170123_055734_create_catalog_image_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp(): void
    {
        $this->createTable(
            'eqt_catalog_image',
            [
                'emplacement_id' => $this->integer()->notNull(),
                'foreshortening_id' => $this->integer()->notNull(),
                'url' => $this->string()->notNull(),
                'is_main' => $this->boolean()->notNull()->defaultValue(0),
                'created_at' => $this->dateTime()->notNull(),
                'updated_at' => $this->dateTime(),
            ]
        );

        $this->addPrimaryKey(
            'eqt_pk_catalog_image',
            'eqt_catalog_image',
            ['emplacement_id', 'foreshortening_id']
        );

        $this->addForeignKey(
            'eqt_fk_catalog_image_emplacement',
            'eqt_catalog_image',
            'emplacement_id',
            'eqt_catalog_emplacement',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'eqt_fk_catalog_image_foreshortening',
            'eqt_catalog_image',
            'foreshortening_id',
            'eqt_catalog_foreshortening',
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
        $this->dropForeignKey('eqt_fk_catalog_image_foreshortening', 'eqt_catalog_image');
        $this->dropForeignKey('eqt_fk_catalog_image_emplacement', 'eqt_catalog_image');
        $this->dropTable('eqt_catalog_image');
    }
}
