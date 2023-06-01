<?php

use yii\db\Migration;

/**
 * Class m200805_114659_add_tbl_dromru_modification_map
 */
class m200805_114659_add_tbl_dromru_modification_map extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('dromru_model_modification_map', [
            'dromru_model_id' => $this->integer()->notNull()->comment('ID из dromru_model'),
            'modification_id' => $this->integer()->notNull()->comment('Наш ID модификации'),
        ]);
        $this->addForeignKey(
            'fk_dromru_model_modification_map_dromru_model_id',
            'dromru_model_modification_map',
            'dromru_model_id',
            'dromru_model',
            'id'
        );
        $this->addForeignKey(
            'fk_dromru_model_modification_map_generation_id',
            'dromru_model_modification_map',
            'modification_id',
            'car_modification',
            'id_car_modification'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('dromru_model_modification_map');
    }
}
