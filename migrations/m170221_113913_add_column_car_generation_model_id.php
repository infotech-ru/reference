<?php

use yii\db\Migration;

class m170221_113913_add_column_car_generation_model_id extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn(
            'car_generation',
            'model_id',
            $this->integer()->after('id_car_model')->comment('при выборке этот атрибут использовать нельзя')
        );
        $this->execute(
            'update car_generation, car_model set car_generation.model_id = car_model.ref_model_id 
where car_generation.id_car_model = car_model.id_car_model'
        );
    }

    public function safeDown(): void
    {
        $this->dropColumn('car_generation', 'model_id');
    }
}
