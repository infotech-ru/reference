<?php

use yii\db\Expression;
use yii\db\Migration;

class m170213_121041_add_column_car_origin_id extends Migration
{
    public function up()
    {
        $this->addColumn('car_mark', 'origin_id', $this->integer());
        $this->update('car_mark', ['origin_id' => new Expression('id_car_mark')]);
        $this->createIndex('car_mark_origin', 'car_mark', 'origin_id');
        $this->addColumn('car_model', 'origin_id', $this->integer());
        $this->update('car_model', ['origin_id' => new Expression('id_car_model')]);
        $this->createIndex('car_model_origin', 'car_model', 'origin_id');
        $this->addColumn('car_generation', 'origin_id', $this->integer());
        $this->update('car_generation', ['origin_id' => new Expression('id_car_generation')]);
        $this->createIndex('car_generation_origin', 'car_generation', 'origin_id');
        $this->addColumn('car_serie', 'origin_id', $this->integer());
        $this->update('car_serie', ['origin_id' => new Expression('id_car_serie')]);
        $this->createIndex('car_serie_origin', 'car_serie', 'origin_id');
        $this->addColumn('car_modification', 'origin_id', $this->integer());
        $this->update('car_modification', ['origin_id' => new Expression('id_car_modification')]);
        $this->createIndex('car_modification_origin', 'car_modification', 'origin_id');
        $this->addColumn('car_characteristic', 'origin_id', $this->integer());
        $this->update('car_characteristic', ['origin_id' => new Expression('id_car_characteristic')]);
        $this->createIndex('car_characteristic_origin', 'car_characteristic', 'origin_id');
        $this->addColumn('car_characteristic_value', 'origin_id', $this->integer());
        $this->update('car_characteristic_value', ['origin_id' => new Expression('id_car_characteristic_value')]);
        $this->createIndex('car_characteristic_value_origin', 'car_characteristic_value', 'origin_id');
    }

    public function down()
    {
        $this->dropColumn('car_mark', 'origin_id');
        $this->dropColumn('car_model', 'origin_id');
        $this->dropColumn('car_generation', 'origin_id');
        $this->dropColumn('car_serie', 'origin_id');
        $this->dropColumn('car_modification', 'origin_id');
        $this->dropColumn('car_characteristic', 'origin_id');
        $this->dropColumn('car_characteristic_value', 'origin_id');
    }
}
