<?php

use yii\db\Migration;

/**
 * Class m200713_111010_add_id_car_equipment_in_car_characteristic_value
 */
class m200713_111010_add_id_car_equipment_in_car_characteristic_value extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('car_characteristic_value', 'id_car_equipment', $this->integer()->after('id_car_modification'));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('car_characteristic_value', 'id_car_equipment');
    }
}
