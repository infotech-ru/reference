<?php

use yii\db\Migration;

class m170818_093842_drop_column_car_generation_id_car_model extends Migration
{
    public function safeUp()
    {
        $this->dropColumn('car_generation', 'id_car_model');
    }

    public function safeDown()
    {
        $this->addColumn('car_generation', 'id_car_model', $this->integer(8)->notNull()->after('name'));
    }
}
