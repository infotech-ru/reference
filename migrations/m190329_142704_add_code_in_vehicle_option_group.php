<?php

use yii\db\Migration;

/**
 * Class m190329_142704_add_code_in_vehicle_option_group
 */
class m190329_142704_add_code_in_vehicle_option_group extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp(): void
    {
        $this->addColumn('vehicle_option_group', 'code', $this->string()->null()->defaultValue(null));
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): void
    {
        $this->dropColumn('vehicle_option_group', 'code');
    }
}
