<?php

use yii\db\Migration;

/**
 * Class m200722_094218_model_image
 */
class m200722_094218_model_image extends Migration
{
    public function safeUp()
    {
        $this->addColumn('model_image', 'generation_id', $this->integer());
        $this->addColumn('model_image', 'series_id', $this->integer());

        $this->addForeignKey(
            'fk_model_image_generation_id',
            'model_image',
            'generation_id',
            'car_generation',
            'id_car_generation'
        );

        $this->addForeignKey(
            'fk_model_image_series_id',
            'model_image',
            'generation_id',
            'car_generation',
            'id_car_generation'
        );
    }

    public function safeDown()
    {
        $this->dropColumn('model_image', 'generation_id');
        $this->dropColumn('model_image', 'series_id');
    }
}
