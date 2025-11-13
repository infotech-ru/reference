<?php

use yii\db\Migration;

/**
 * Class m251112_080405_elt_poisk_mappings
 */
class m251112_080405_elt_poisk_mappings extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('elt_legal_entity_type_map', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'legal_entity_type_id' => $this->integer()->null()
        ]);

        $this->addForeignKey(
            'fk_elt_legal_entity_type_map_legal_entity_id',
            'elt_legal_entity_type_map',
            'legal_entity_type_id',
            'legal_entity_type',
            'id'
        );

        $this->createTable('elt_make', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);

        $this->createTable('elt_model', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'make_id' => $this->integer()
        ]);

        $this->addForeignKey(
            'fk_elt_model_make_id',
            'elt_model',
            'make_id',
            'elt_make',
            'id'
        );


        $this->createTable('elt_make_map', [
            'make_id' => $this->integer(),
            'ref_brand_id' => $this->integer()->unsigned(),
        ]);
        $this->addPrimaryKey(
            'pk_elt_make_map',
            'elt_make_map',
            ['make_id', 'ref_brand_id']
        );
        $this->addForeignKey(
            'fk_elt_make_map_make_id',
            'elt_make_map',
            'make_id',
            'elt_make',
            'id'
        );
        $this->addForeignKey(
            'fk_elt_make_map_ref_brand_id',
            'elt_make_map',
            'ref_brand_id',
            'brands',
            'id'
        );


        $this->createTable('elt_model_map', [
            'model_id' => $this->integer(),
            'ref_model_id' => $this->integer(),
        ]);
        $this->addPrimaryKey(
            'pk_elt_model_map',
            'elt_model_map',
            ['model_id', 'ref_model_id']
        );
        $this->addForeignKey(
            'fk_elt_model_map_model_id',
            'elt_model_map',
            'model_id',
            'elt_model',
            'id'
        );
        $this->addForeignKey(
            'fk_elt_model_map_ref_model_id',
            'elt_model_map',
            'ref_model_id',
            'models',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('elt_legal_entity_type_map');
        $this->dropTable('elt_model_map');
        $this->dropTable('elt_make_map');

        $this->dropTable('elt_model');
        $this->dropTable('elt_make');
    }
}
