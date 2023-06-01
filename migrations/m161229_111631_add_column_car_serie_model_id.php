<?php

use yii\db\Migration;

class m161229_111631_add_column_car_serie_model_id extends Migration
{
    public function up()
    {
        $this->addColumn('car_serie', 'model_id', $this->integer()->after('id_car_model'));
        $this->addForeignKey('fk_car_serie_model', 'car_serie', 'model_id', 'models', 'id');
        $this->execute(
            'update car_serie, car_model set car_serie.model_id = car_model.ref_model_id 
WHERE car_model.id_car_model = car_serie.id_car_model'
        );
    }

    public function down()
    {
        $this->dropForeignKey('fk_car_serie_model', 'car_serie');
        $this->dropColumn('car_serie', 'model_id');
    }
}
