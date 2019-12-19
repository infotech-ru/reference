<?php

use yii\db\Migration;

/**
 * Class m191219_132206_add_tbl_dromru_model_map
 */
class m191219_132206_add_tbl_dromru_model_map extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('dromru_model', 'model_id');

        $this->createTable('dromru_model_map', [
            'dromru_model_id' => $this->integer()->notNull()->comment('ID из dromru_model'),
            'model_id' => $this->integer()->notNull()->comment('Наш ID модели'),
        ]);

        $this->addPrimaryKey(
            'pk_dromru_model_map',
            'dromru_model_map',
            ['dromru_model_id', 'model_id']
        );

        $this->addForeignKey(
            'fk_dromru_model_dromru_model_id',
            'dromru_model_map',
            'dromru_model_id',
            'dromru_model',
            'id'
        );

        $this->addForeignKey(
            'fk_dromru_model_map_model_id',
            'dromru_model_map',
            'model_id',
            'models',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('dromru_model', 'model_id', $this->integer());

        $this->dropTable('dromru_model_map');
    }

}
