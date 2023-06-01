<?php

use yii\db\Migration;

class m170818_085950_add_models_origin_id extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn('models', 'origin_id', $this->integer()->comment('ссылка на таблицу eqt_car_model'));
        $this->execute(
            'update models, car_model set models.origin_id = id_car_model where car_model.ref_model_id = models.id'
        );
    }

    public function safeDown(): void
    {
        $this->dropColumn('models', 'origin_id');
    }
}
