<?php

use yii\db\Migration;

/**
 * Class m210511_133702_add_column_skin_id_to_model_image
 */
class m210511_133702_add_column_skin_id_to_model_image extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->addColumn('model_image', 'skin_id', $this->integer()->defaultValue(null)->after('equipment_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropColumn('model_image', 'skin_id');
    }
}
