<?php

use yii\db\Migration;

/**
 * Handles the creation of table `vehicle_option_type`.
 */
class m180903_124139_create_vehicle_option_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp(): void
    {
        $this->createTable('vehicle_option_type', [
            'id' => $this->primaryKey(),
            'group_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull()->unique(),
            'values_json' => $this->text(),
        ]);

        $this->addForeignKey(
            'fk_vehicle_option_type_group_id',
            'vehicle_option_type',
            'group_id',
            'vehicle_option_group',
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
        $this->dropForeignKey('fk_vehicle_option_type_group_id', 'vehicle_option_type');
        $this->dropTable('vehicle_option_type');
    }
}
