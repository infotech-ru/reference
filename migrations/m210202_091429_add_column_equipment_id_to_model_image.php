<?php

use yii\db\Migration;

/**
 * Class m210202_091429_add_column_equipment_id_to_model_image
 */
class m210202_091429_add_column_equipment_id_to_model_image extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('model_image', 'equipment_id', $this->integer());
        $this->addForeignKey(
            'FK_model_image_equipment_id',
            'model_image',
            'equipment_id',
            'eqt_equipment',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_model_image_equipment_id', 'model_image');
        $this->dropColumn('model_image', 'equipment_id');
    }
}
