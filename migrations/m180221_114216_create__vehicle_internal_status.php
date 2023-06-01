<?php

use yii\db\Migration;

class m180221_114216_create__vehicle_internal_status extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'vehicle_internal_status',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
    }

    public function safeDown()
    {
        $this->dropTable('vehicle_internal_status');
    }
}
