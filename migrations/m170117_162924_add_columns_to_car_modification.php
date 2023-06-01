<?php

use yii\db\Migration;

class m170117_162924_add_columns_to_car_modification extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn(
            'car_modification',
            'drive_type',
            $this->integer(1)->defaultValue(null)->after('end_production_year')
        );
        $this->addColumn(
            'car_modification',
            'engine_type',
            $this->integer(1)->defaultValue(null)->after('drive_type')
        );
        $this->addColumn(
            'car_modification',
            'transmission_type',
            $this->integer(1)->defaultValue(null)->after('engine_type')
        );
    }

    public function safeDown(): void
    {
        $this->dropColumn('car_modification', 'transmission_type');
        $this->dropColumn('car_modification', 'engine_type');
        $this->dropColumn('car_modification', 'drive_type');
    }
}
