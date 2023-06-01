<?php

use yii\db\Migration;

/**
 * Class m191217_133209_add_dromru_map_tables
 */
class m191217_133209_add_dromru_map_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('dromru_model_generation_map', [
            'dromru_model_id' => $this->integer()->notNull()->comment('ID из dromru_model'),
            'generation_id' => $this->integer()->notNull()->comment('Наш ID поколения'),
        ]);

        $this->createTable('dromru_model_serie_map', [
            'dromru_model_id' => $this->integer()->notNull()->comment('ID из dromru_model'),
            'serie_id' => $this->integer()->notNull()->comment('Наш ID серии'),
        ]);

        $this->addPrimaryKey(
            'pk_dromru_model_generation_map',
            'dromru_model_generation_map',
            ['dromru_model_id', 'generation_id']
        );

        $this->addPrimaryKey(
            'pk_dromru_model_serie_map',
            'dromru_model_serie_map',
            ['dromru_model_id', 'serie_id']
        );

        $this->addForeignKey(
            'fk_dromru_model_generation_map_dromru_model_id',
            'dromru_model_generation_map',
            'dromru_model_id',
            'dromru_model',
            'id'
        );

        $this->addForeignKey(
            'fk_dromru_model_generation_map_generation_id',
            'dromru_model_generation_map',
            'generation_id',
            'car_generation',
            'id_car_generation'
        );

        $this->addForeignKey(
            'fk_dromru_model_serie_map_dromru_model_id',
            'dromru_model_serie_map',
            'dromru_model_id',
            'dromru_model',
            'id'
        );

        $this->addForeignKey(
            'fk_dromru_model_serie_map_serie_id',
            'dromru_model_serie_map',
            'serie_id',
            'car_serie',
            'id_car_serie'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('dromru_model_generation_map');
        $this->dropTable('dromru_model_serie_map');
    }
}
