<?php

use yii\db\Migration;

class m161107_084550_add_column_car_generation_is_recent extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn('car_generation', 'is_recent', $this->boolean()->notNull());
        $this->update('car_generation', ['is_recent' => 1]);
    }

    public function safeDown(): void
    {
        $this->dropColumn('car_generation', 'is_recent');
    }
}
