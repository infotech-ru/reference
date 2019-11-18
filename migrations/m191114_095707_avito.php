<?php


use yii\db\Migration;

class m191114_095707_avito extends Migration
{
    public function safeUp()
    {
        $this->createTable('avito_make', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
        
        $this->createTable('avito_model', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'make_id' => $this->integer()
        ]);
        
        $this->addForeignKey(
            'fk_avito_model_make_id',
            'avito_model',
            'make_id',
            'avito_make',
            'id'
        );
        
        $this->createTable('avito_generation', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'model_id' => $this->integer()
        ]);
        
        $this->addForeignKey(
            'fk_avito_generation_model_id',
            'avito_generation',
            'model_id',
            'avito_model',
            'id'
        );
        
        $this->createTable('avito_modification', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'generation_id' => $this->integer(),
            'year_from' => $this->string(),
            'year_to' => $this->string(),
            'body_type' => $this->string(),
            'doors' => $this->string(),
            'fuel_type' => $this->string(),
            'drive_type' => $this->string(),
            'transmission' => $this->string(),
            'power' => $this->string(),
            'engine_size' => $this->string(),
        ]);
        
        $this->addForeignKey(
            'fk_avito_modification_generation_id',
            'avito_modification',
            'generation_id',
            'avito_generation',
            'id'
        );
        
        $this->createTable('avito_complectation', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'modification_id' => $this->integer()
        ]);
        
        $this->addForeignKey(
            'fk_avito_complectation_modification_id',
            'avito_complectation',
            'modification_id',
            'avito_modification',
            'id'
        );
        
        
        $this->createTable('avito_make_map', [
            'make_id' => $this->integer(),
            'ref_brand_id' => $this->integer()->unsigned(),
        ]);
        $this->addPrimaryKey(
            'pk_avito_make_map',
            'avito_make_map',
            ['make_id', 'ref_brand_id']
        );
        $this->addForeignKey(
            'fk_avito_make_map_make_id',
            'avito_make_map',
            'make_id',
            'avito_make',
            'id'
        );
        $this->addForeignKey(
            'fk_avito_make_map_ref_brand_id',
            'avito_make_map',
            'ref_brand_id',
            'brands',
            'id'
        );
        
        
        $this->createTable('avito_model_map', [
            'model_id' => $this->integer(),
            'ref_model_id' => $this->integer(),
        ]);
        $this->addPrimaryKey(
            'pk_avito_model_map',
            'avito_model_map',
            ['model_id', 'ref_model_id']
        );
        $this->addForeignKey(
            'fk_avito_model_map_model_id',
            'avito_model_map',
            'model_id',
            'avito_model',
            'id'
        );
        $this->addForeignKey(
            'fk_avito_model_map_ref_model_id',
            'avito_model_map',
            'ref_model_id',
            'models',
            'id'
        );
        
        
        $this->createTable('avito_generation_map', [
            'generation_id' => $this->integer(),
            'ref_generation_id' => $this->integer(),
        ]);
        $this->addPrimaryKey(
            'pk_avito_generation_map',
            'avito_generation_map',
            ['generation_id', 'ref_generation_id']
        );
        $this->addForeignKey(
            'fk_avito_generation_map_generation_id',
            'avito_generation_map',
            'generation_id',
            'avito_generation',
            'id'
        );
        $this->addForeignKey(
            'fk_avito_generation_map_ref_generation_id',
            'avito_generation_map',
            'ref_generation_id',
            'car_generation',
            'id_car_generation'
        );
        
        
        $this->createTable('avito_modification_map_serie', [
            'modification_id' => $this->integer(),
            'ref_serie_id' => $this->integer(),
        ]);
        $this->addPrimaryKey(
            'pk_avito_modification_map_serie',
            'avito_modification_map_serie',
            ['modification_id', 'ref_serie_id']
        );
        $this->addForeignKey(
            'fk_avito_modification_map_serie_modification_id',
            'avito_modification_map_serie',
            'modification_id',
            'avito_modification',
            'id'
        );
        $this->addForeignKey(
            'fk_avito_modification_map_serie_ref_serie_id',
            'avito_modification_map_serie',
            'ref_serie_id',
            'car_serie',
            'id_car_serie'
        );
        
        
        $this->createTable('avito_modification_map_mod', [
            'modification_id' => $this->integer(),
            'ref_modification_id' => $this->integer(),
        ]);
        $this->addPrimaryKey(
            'pk_avito_modification_map_mod',
            'avito_modification_map_mod',
            ['modification_id', 'ref_modification_id']
        );
        $this->addForeignKey(
            'fk_avito_modification_map_mod_modification_id',
            'avito_modification_map_mod',
            'modification_id',
            'avito_modification',
            'id'
        );
        $this->addForeignKey(
            'fk_avito_modification_map_mod_ref_modification_id',
            'avito_modification_map_mod',
            'ref_modification_id',
            'car_modification',
            'id_car_modification'
        );
        
        
        $this->createTable('avito_complectation_map', [
            'complectation_id' => $this->integer(),
            'ref_complectation_id' => $this->integer(),
        ]);
        $this->addPrimaryKey(
            'pk_avito_complectation_map',
            'avito_complectation_map',
            ['complectation_id', 'ref_complectation_id']
        );
        $this->addForeignKey(
            'fk_avito_complectation_map_complectation_id',
            'avito_complectation_map',
            'complectation_id',
            'avito_complectation',
            'id'
        );
        $this->addForeignKey(
            'fk_avito_complectation_map_ref_complectation_id',
            'avito_complectation_map',
            'ref_complectation_id',
            'eqt_equipment',
            'id'
        );
    }
    
    public function safeDown()
    {
        $this->dropTable('avito_complectation_map');
        $this->dropTable('avito_modification_map_mod');
        $this->dropTable('avito_modification_map_serie');
        $this->dropTable('avito_generation_map');
        $this->dropTable('avito_model_map');
        $this->dropTable('avito_make_map');
        
        
        $this->dropTable('avito_complectation');
        $this->dropTable('avito_modification');
        $this->dropTable('avito_generation');
        $this->dropTable('avito_model');
        $this->dropTable('avito_make');
    }
}
