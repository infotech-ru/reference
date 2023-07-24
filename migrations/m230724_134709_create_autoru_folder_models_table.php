<?php

use yii\db\Migration;

/**
 * Handles the creation of table `autoru_folder_models`.
 */
class m230724_134709_create_autoru_folder_models_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('eqt_autoru_folder_models', [
            'id' => $this->primaryKey(),
            'folder_id' => $this->integer(),
            'model_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx_autoru_folder_models_folder_id_model_id',
            'eqt_autoru_folder_models',
            ['folder_id', 'model_id'],
            true
        );

        $this->addForeignKey(
            'fk_autoru_folder_models_folder_id',
            'eqt_autoru_folder_models',
            'folder_id',
            'eqt_autoru_folder',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_autoru_folder_models_model_id',
            'eqt_autoru_folder_models',
            'model_id',
            'models',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('eqt_autoru_folder_models');
    }
}
