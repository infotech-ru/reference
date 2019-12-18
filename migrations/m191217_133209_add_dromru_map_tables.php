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
            'dromru_model_id' => $this->integer()->notNull()->unsigned()->comment('ID из dromru_model'),
            'generation_id' => $this->integer()->notNull()->unsigned()->comment('Наш ID поколения'),
        ]);

        $this->createTable('dromru_model_serie_map', [
            'dromru_model_id' => $this->integer()->notNull()->unsigned()->comment('ID из dromru_model'),
            'serie_id' => $this->integer()->notNull()->unsigned()->comment('Наш ID серии'),
        ]);

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
