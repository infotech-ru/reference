<?php

use yii\db\Migration;

/**
 * Class m210514_075008_add_column_car_modification_mileage_interservice_gap
 */
class m210514_075008_add_column_car_modification_mileage_interservice_gap extends Migration
{
    public function safeUp()
    {
        $this->addColumn('car_modification', 'mileage_interservice_gap', $this->integer());
    }

    public function safeDown()
    {
        $this->dropColumn('car_modification', 'mileage_interservice_gap');
    }
}
