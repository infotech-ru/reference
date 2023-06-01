<?php

use yii\db\Migration;

class m191107_095900_autoru_mapping extends Migration
{
    public function safeUp()
    {
        $this->createTable('eqt_autoru_color', [
            'autoru_id' => $this->integer()->defaultValue(0),
            'color_id' => $this->integer()->defaultValue(0),
        ]);

        $this->addPrimaryKey(
            'pk_eqt_autoru_color',
            'eqt_autoru_color',
            ['autoru_id', 'color_id']
        );

        $this->createTable('eqt_autoru_complectation', [
            'id' => $this->primaryKey()->defaultValue(0),
            'name' => $this->string(),
        ]);

        $this->createTable('eqt_autoru_complectation_map', [
            'complectation_id' => $this->integer(),
            'modification_id' => $this->integer(),
            'map_id' => $this->integer(),
        ]);

        $this->addPrimaryKey(
            'pk_eqt_autoru_complectation_map',
            'eqt_autoru_complectation_map',
            ['complectation_id', 'modification_id']
        );

        $this->createTable('eqt_autoru_complectation_mapped', [
            'complectation_id' => $this->integer(),
            'modification_id' => $this->integer(),
            'map_id' => $this->integer()->defaultValue(0),
        ]);

        $this->addPrimaryKey(
            'pk_eqt_autoru_complectation_mapped',
            'eqt_autoru_complectation_mapped',
            ['complectation_id', 'modification_id', 'map_id']
        );

        $this->createTable('eqt_autoru_configuration', [
            'id' => $this->primaryKey()->defaultValue(0),
            'folder_id' => $this->integer(),
            'body_type' => $this->string(),
            'years' => $this->string(),
            'serie_id' => $this->integer(),
            'doors_count' => $this->integer(),
        ]);

        $this->createTable('eqt_autoru_configuration_map', [
            'configuration_id' => $this->integer()->defaultValue(0),
            'serie_id' => $this->integer()->defaultValue(0),
        ]);

        $this->addPrimaryKey(
            'pk_eqt_autoru_configuration_map',
            'eqt_autoru_configuration_map',
            ['configuration_id', 'serie_id']
        );

        $this->createTable('eqt_autoru_folder', [
            'id' => $this->primaryKey()->defaultValue(0),
            'name' => $this->string(),
            'mark_id' => $this->integer(),
            'model_id' => $this->integer(),
            'generation_id' => $this->integer(),
            'model_is_recent' => $this->smallInteger(),
            'is_use_lkt' => $this->smallInteger(1)->defaultValue(0),
        ]);

        $this->createTable('eqt_autoru_folder_generations', [
            'id' => $this->primaryKey(),
            'folder_id' => $this->integer(),
            'generation_id' => $this->integer(),
        ]);


        $this->createTable('eqt_autoru_lkt', [
            'id' => $this->integer(),
            'mark' => $this->string(),
            'folder_id' => $this->primaryKey(),
            'folder' => $this->string(),
            'brand_id' => $this->integer(),
        ]);

        $this->createTable('eqt_autoru_lkt_folder_generation', [
            'folder_id' => $this->integer()->defaultValue(0),
            'generation_id' => $this->integer()->defaultValue(0),
        ]);

        $this->addPrimaryKey(
            'pk_eqt_autoru_lkt_folder_generation',
            'eqt_autoru_lkt_folder_generation',
            ['folder_id', 'generation_id']
        );

        $this->createTable('eqt_autoru_lkt_folder_mark', [
            'folder_id' => $this->integer()->defaultValue(0),
            'brand_id' => $this->integer()->defaultValue(0),
        ]);

        $this->addPrimaryKey(
            'pk_eqt_autoru_lkt_folder_mark',
            'eqt_autoru_lkt_folder_mark',
            ['folder_id', 'brand_id']
        );

        $this->createTable('eqt_autoru_lkt_folder_models', [
            'folder_id' => $this->integer()->defaultValue(0),
            'model_id' => $this->integer()->defaultValue(0),
        ]);

        $this->addPrimaryKey(
            'pk_eqt_autoru_lkt_folder_models',
            'eqt_autoru_lkt_folder_models',
            ['folder_id', 'model_id']
        );

        $this->createTable('eqt_autoru_lkt_folder_serie', [
            'folder_id' => $this->integer()->defaultValue(0),
            'serie_id' => $this->integer()->defaultValue(0),
        ]);

        $this->addPrimaryKey(
            'pk_eqt_autoru_lkt_folder_serie',
            'eqt_autoru_lkt_folder_serie',
            ['folder_id', 'serie_id']
        );

        $this->createTable('eqt_autoru_mark', [
            'id' => $this->primaryKey()->defaultValue(0),
            'name' => $this->string(),
            'brand_id' => $this->integer(),
        ]);

        $this->createTable('eqt_autoru_modification', [
            'id' => $this->primaryKey()->defaultValue(0),
            'name' => $this->string(),
            'configuration_id' => $this->integer(),
            'tech_param_id' => $this->string(),
        ]);

        $this->createTable('eqt_autoru_modification_map', [
            'modification_id' => $this->integer()->defaultValue(0),
            'map_id' => $this->integer()->defaultValue(0),
        ]);

        $this->addPrimaryKey(
            'pk_eqt_autoru_modification_map',
            'eqt_autoru_modification_map',
            ['modification_id', 'map_id']
        );

        $this->createIndex(
            'idx_eqt_autoru_complectation_map_map_id',
            'eqt_autoru_complectation_map',
            'map_id'
        );

        $this->createIndex(
            'idx_eqt_autoru_complectation_map_modification_id',
            'eqt_autoru_complectation_map',
            'modification_id'
        );

        $this->createIndex(
            'idx_eqt_autoru_mark_brand_id',
            'eqt_autoru_mark',
            'brand_id'
        );

        $this->addForeignKey(
            'fk_eqt_autoru_complectation_mapped',
            'eqt_autoru_complectation_mapped',
            ['complectation_id', 'modification_id'],
            'eqt_autoru_complectation_map',
            ['complectation_id', 'modification_id']
        );

        $this->addForeignKey(
            'fk_eqt_autoru_configuration_folder_id',
            'eqt_autoru_configuration',
            ['folder_id'],
            'eqt_autoru_folder',
            ['id']
        );

        $this->addForeignKey(
            'fk_eqt_autoru_configuration_map_configuration_id',
            'eqt_autoru_configuration_map',
            ['configuration_id'],
            'eqt_autoru_configuration',
            ['id']
        );

        $this->addForeignKey(
            'fk_eqt_autoru_folder_mark_id',
            'eqt_autoru_folder',
            ['mark_id'],
            'eqt_autoru_mark',
            ['id']
        );

        $this->addForeignKey(
            'fk_eqt_autoru_folder_generations_folder_id',
            'eqt_autoru_folder_generations',
            ['folder_id'],
            'eqt_autoru_folder',
            ['id']
        );

        $this->addForeignKey(
            'fk_eqt_autoru_lkt_folder_generation_folder_id',
            'eqt_autoru_lkt_folder_generation',
            ['folder_id'],
            'eqt_autoru_lkt',
            ['folder_id']
        );

        $this->addForeignKey(
            'fk_eqt_autoru_lkt_folder_mark_folder_id',
            'eqt_autoru_lkt_folder_mark',
            ['folder_id'],
            'eqt_autoru_lkt',
            ['folder_id']
        );

        $this->addForeignKey(
            'fk_eqt_autoru_lkt_folder_models_folder_id',
            'eqt_autoru_lkt_folder_models',
            ['folder_id'],
            'eqt_autoru_lkt',
            ['folder_id']
        );

        $this->addForeignKey(
            'fk_eqt_autoru_lkt_folder_serie_folder_id',
            'eqt_autoru_lkt_folder_serie',
            ['folder_id'],
            'eqt_autoru_lkt',
            ['folder_id']
        );

        $this->addForeignKey(
            'fk_eqt_autoru_modification_configuration_id',
            'eqt_autoru_modification',
            ['configuration_id'],
            'eqt_autoru_configuration',
            ['id']
        );

        $this->addForeignKey(
            'fk_eqt_autoru_modification_map',
            'eqt_autoru_modification_map',
            ['modification_id'],
            'eqt_autoru_modification',
            ['id']
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey(
            'fk_eqt_autoru_complectation_mapped',
            'eqt_autoru_complectation_mapped'
        );

        $this->dropForeignKey(
            'fk_eqt_autoru_configuration_folder_id',
            'eqt_autoru_configuration'
        );

        $this->dropForeignKey(
            'fk_eqt_autoru_configuration_map_configuration_id',
            'eqt_autoru_configuration_map'
        );

        $this->dropForeignKey(
            'fk_eqt_autoru_folder_mark_id',
            'eqt_autoru_folder'
        );

        $this->dropForeignKey(
            'fk_eqt_autoru_folder_generations_folder_id',
            'eqt_autoru_folder_generations'
        );

        $this->dropForeignKey(
            'fk_eqt_autoru_lkt_folder_generation_folder_id',
            'eqt_autoru_lkt_folder_generation'
        );

        $this->dropForeignKey(
            'fk_eqt_autoru_lkt_folder_mark_folder_id',
            'eqt_autoru_lkt_folder_mark'
        );

        $this->dropForeignKey(
            'fk_eqt_autoru_lkt_folder_models_folder_id',
            'eqt_autoru_lkt_folder_models'
        );

        $this->dropForeignKey(
            'fk_eqt_autoru_lkt_folder_serie_folder_id',
            'eqt_autoru_lkt_folder_serie'
        );

        $this->dropForeignKey(
            'fk_eqt_autoru_modification_configuration_id',
            'eqt_autoru_modification'
        );

        $this->dropForeignKey(
            'fk_eqt_autoru_modification_map',
            'eqt_autoru_modification_map'
        );


        $this->dropIndex(
            'idx_eqt_autoru_complectation_map_map_id',
            'eqt_autoru_complectation_map'
        );

        $this->dropIndex(
            'idx_eqt_autoru_complectation_map_modification_id',
            'eqt_autoru_complectation_map'
        );

        $this->dropIndex(
            'idx_eqt_autoru_mark_brand_id',
            'eqt_autoru_mark'
        );


        $this->dropTable('eqt_autoru_color');
        $this->dropTable('eqt_autoru_complectation');
        $this->dropTable('eqt_autoru_complectation_map');
        $this->dropTable('eqt_autoru_complectation_mapped');
        $this->dropTable('eqt_autoru_configuration');
        $this->dropTable('eqt_autoru_configuration_map');
        $this->dropTable('eqt_autoru_folder');
        $this->dropTable('eqt_autoru_folder_generations');
        $this->dropTable('eqt_autoru_lkt');
        $this->dropTable('eqt_autoru_lkt_folder_generation');
        $this->dropTable('eqt_autoru_lkt_folder_mark');
        $this->dropTable('eqt_autoru_lkt_folder_models');
        $this->dropTable('eqt_autoru_lkt_folder_serie');
        $this->dropTable('eqt_autoru_mark');
        $this->dropTable('eqt_autoru_modification');
        $this->dropTable('eqt_autoru_modification_map');
    }
}
