<?php

use yii\db\Migration;

/**
 * Handles the creation of table `vehicle_option_group`.
 */
class m180903_123941_create_vehicle_option_group_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp(): void
    {
        $this->createTable('vehicle_option_group', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): void
    {
        $this->dropTable('vehicle_option_group');
    }
}
