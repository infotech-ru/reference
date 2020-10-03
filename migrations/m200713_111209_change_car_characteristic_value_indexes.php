<?php

use yii\db\Migration;

/**
 * Class m200713_111209_change_car_characteristic_value_indexes
 */
class m200713_111209_change_car_characteristic_value_indexes extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->dropIndex('id_characteristic', 'car_characteristic_value');
        $this->dropIndex('id_car_characteristic', 'car_characteristic_value');

        $this->createIndex(
            'idx',
            'car_characteristic_value',
            ['id_car_characteristic', 'id_car_modification', 'id_car_equipment', 'id_car_type'],
            true
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropIndex('idx', 'car_characteristic_value');

        $this->createIndex(
            'id_characteristic',
            'car_characteristic_value',
            ['id_car_characteristic', 'id_car_modification'],
            true
        );
        $this->createIndex(
            'id_car_characteristic',
            'car_characteristic_value',
            ['id_car_characteristic', 'id_car_modification', 'id_car_type'],
            true
        );
    }
}
