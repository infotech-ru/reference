<?php

use yii\db\Migration;

class m161107_084550_add_column_car_generation_is_recent extends Migration
{
    public function up()
    {
        $this->addColumn('car_generation', 'is_recent', $this->boolean()->notNull());
        $this->update('car_generation', ['is_recent' => 1]);
    }

    public function down()
    {
        $this->dropColumn('car_generation', 'is_recent');
    }
}
