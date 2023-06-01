<?php

use yii\db\Migration;

/**
 * Class m210511_131858_add_column_placement_type_to_model_image
 */
class m210511_131858_add_column_placement_type_to_model_image extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->addColumn('model_image', 'placement_type', $this->integer()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropColumn('model_image', 'placement_type');
    }
}
