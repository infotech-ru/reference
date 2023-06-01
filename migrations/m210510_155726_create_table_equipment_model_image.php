<?php

use yii\db\Migration;

/**
 * Class m210510_155726_create_table_equipment_model_image
 */
class m210510_155726_create_table_equipment_model_image extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp(): void
    {
        $this->createTable(
            'eqt_equipment_model_image',
            [
                'model_image_id' => $this->integer()->notNull(),
                'equipment_id' => $this->integer()->notNull(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );

        $this->addPrimaryKey(
            'equipment_model_image-pk',
            'eqt_equipment_model_image',
            ['model_image_id', 'equipment_id']
        );

        $this->addForeignKey(
            'equipment_model_image-model_image-fk',
            'eqt_equipment_model_image',
            'model_image_id',
            'model_image',
            'id'
        );

        $this->addForeignKey(
            'equipment_model_image-equipment-fk',
            'eqt_equipment_model_image',
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
        $this->dropForeignKey('equipment_model_image-equipment-fk', 'eqt_equipment_model_image');
        $this->dropForeignKey('equipment_model_image-model_image-fk', 'eqt_equipment_model_image');
        $this->dropTable('eqt_equipment_model_image');
    }
}
