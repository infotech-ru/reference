<?php

use yii\db\Migration;

class m170214_091810_add_column_is_main_car_characteristic extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn('car_characteristic', 'is_main', $this->boolean()->after('id_car_type'));
        $this->update('car_characteristic', ['is_main' => 0]);
    }

    public function safeDown(): void
    {
        $this->dropColumn('car_characteristic', 'is_main');
    }
}
