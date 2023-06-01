<?php

use yii\db\Migration;

class m170818_125755_drop_column_car_modification_id_car_model extends Migration
{
    public function safeUp(): void
    {
        $this->dropColumn('car_modification', 'id_car_model');
    }

    public function safeDown(): void
    {
        $this->addColumn(
            'car_modification',
            'id_car_model',
            $this->integer(8)->notNull()->after('id_car_modification')
        );
    }
}
