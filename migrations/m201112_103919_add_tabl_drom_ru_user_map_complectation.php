<?php

use yii\db\Migration;

/**
 * Class m201112_103919_add_tabl_drom_ru_user_map_complectation
 */
class m201112_103919_add_tabl_drom_ru_user_map_complectation extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'dromru_user_complectation',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string(),
                'dromru_model_id' => $this->integer(),
                'dromru_complectation_id' => $this->integer(),
            ]
        );

        $this->createTable(
            'dromru_user_complectation_map',
            [
                'id' => $this->primaryKey(),
                'user_complectation_id' => $this->integer(),
                'ref_equipment_id' => $this->integer(),
            ]
        );

        $this->createTable(
            'dromru_user_modification_map',
            [
                'id' => $this->primaryKey(),
                'user_complectation_id' => $this->integer(),
                'ref_modification_id' => $this->integer(),
            ]
        );
        $this->addForeignKey(
            'fk_dromru_user_complectation_map_user_complectation_id',
            'dromru_user_complectation_map',
            'user_complectation_id',
            'dromru_user_complectation',
            'id'
        );
        $this->addForeignKey(
            'fk_dromru_user_complectation_map_ref_equipment_id',
            'dromru_user_complectation_map',
            'ref_equipment_id',
            'eqt_equipment',
            'id'
        );
        $this->addForeignKey(
            'fk_dromru_user_modification_map_user_complectation_id',
            'dromru_user_modification_map',
            'user_complectation_id',
            'dromru_user_complectation',
            'id'
        );
        $this->addForeignKey(
            'fk_dromru_user_modification_map_ref_modification_id',
            'dromru_user_modification_map',
            'ref_modification_id',
            'car_modification',
            'id_car_modification'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk_dromru_user_complectation_map_user_complectation_id',
            'dromru_user_complectation_map'
        );
        $this->dropForeignKey('fk_dromru_user_complectation_map_ref_equipment_id', 'dromru_user_complectation_map');
        $this->dropForeignKey('fk_dromru_user_modification_map_user_complectation_id', 'dromru_user_modification_map');
        $this->dropForeignKey('fk_dromru_user_modification_map_ref_modification_id', 'dromru_user_modification_map');
        $this->dropTable('dromru_user_complectation');
        $this->dropTable('dromru_user_complectation_map');
        $this->dropTable('dromru_user_modification_map');
    }
}
