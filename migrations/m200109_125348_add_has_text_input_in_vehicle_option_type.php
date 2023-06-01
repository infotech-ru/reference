<?php

use yii\db\Migration;

/**
 * Class m200109_125348_add_has_text_input_in_vehicle_option_type
 */
class m200109_125348_add_has_text_input_in_vehicle_option_type extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp(): void
    {
        $this->addColumn('vehicle_option_type', 'has_text_input', $this->boolean()->notNull()->defaultValue(false));
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): void
    {
        $this->dropColumn('vehicle_option_type', 'has_text_input');
    }
}
