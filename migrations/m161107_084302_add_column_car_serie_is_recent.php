<?php

use yii\db\Migration;

class m161107_084302_add_column_car_serie_is_recent extends Migration
{
    public function up()
    {
        $this->addColumn('car_serie', 'is_recent', $this->boolean()->notNull());
        $this->update('car_serie', ['is_recent' => 1]);
    }

    public function down()
    {
        $this->dropColumn('car_serie', 'is_recent');
    }
}
