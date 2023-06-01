<?php

use yii\db\Migration;

class m180112_090556_create_vehicle_passport_status extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'vehicle_passport_status',
            [
                'id' => $this->integer()->notNull(),
                'name' => $this->string(),
            ]
        );
        $this->addPrimaryKey('PRIMARY_KEY', 'vehicle_passport_status', 'id');
    }

    public function safeDown()
    {
        $this->dropTable('vehicle_passport_status');
    }
}
