<?php

use yii\db\Migration;

class m170327_131812_create__car_characteristic_value__id_car_modification__index extends Migration
{
    public function up()
    {
        $this->createIndex('id_car_modification', 'car_characteristic_value', 'id_car_modification');
    }

    public function down()
    {
        $this->dropIndex('id_car_modification', 'car_characteristic_value');
    }
}
