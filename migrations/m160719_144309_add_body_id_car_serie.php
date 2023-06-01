<?php

use yii\db\Migration;

class m160719_144309_add_body_id_car_serie extends Migration
{
    public function up()
    {
        $this->addColumn('car_serie', 'body_id', $this->integer());
        $this->addForeignKey('fk_car_serie_body', 'car_serie', 'body_id', 'bodies', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('fk_car_serie_body', 'car_serie');
        $this->dropColumn('car_serie', 'body_id');
    }
}
