<?php

use yii\db\Migration;

class m170818_124451_drop_column_car_serie_id_car_model extends Migration
{
    public function safeUp(): void
    {
        $this->dropColumn('car_serie', 'id_car_model');
    }

    public function safeDown(): void
    {
        $this->addColumn('car_serie', 'id_car_model', $this->integer(8)->notNull()->after('id_car_serie'));
    }
}
