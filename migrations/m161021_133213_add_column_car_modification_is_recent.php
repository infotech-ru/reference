<?php

use yii\db\Migration;

class m161021_133213_add_column_car_modification_is_recent extends Migration
{
    public function up()
    {
        $this->addColumn('car_modification', 'is_recent', $this->boolean()->notNull()->defaultValue(1));
    }

    public function down()
    {
        $this->dropColumn('car_modification', 'is_recent');
    }
}
