<?php

use yii\db\Migration;

/**
 * Class m201112_103919_add_tabl_drom_ru_user_map_complectation
 */
class m201112_103919_add_tabl_drom_ru_user_map_complectation extends Migration
{
    protected $fk_data = [
        ['dromru_user_complectation_map', 'user_complectation_id', 'dromru_user_complectation', 'id'],
        ['dromru_user_complectation_map', 'ref_equipment_id', 'eqt_equipment', 'id'],

        ['dromru_user_modification_map', 'user_complectation_id', 'dromru_user_complectation', 'id'],
        ['dromru_user_modification_map', 'ref_modification_id', 'car_modification', 'id_car_modification'],
    ];

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('dromru_user_complectation', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'dromru_model_id' => $this->integer(),
            'dromru_complectation_id' => $this->integer(),
        ]);

        $this->createTable('dromru_user_complectation_map', [
            'id' => $this->primaryKey(),
            'user_complectation_id' => $this->integer(),
            'ref_equipment_id' => $this->integer(),
        ]);

        $this->createTable('dromru_user_modification_map', [
            'id' => $this->primaryKey(),
            'user_complectation_id' => $this->integer(),
            'ref_modification_id' => $this->integer(),
        ]);

        foreach ($this->fk_data as $fk) {
            $md5name = md5(implode('_', [$fk[0], $fk[1], $fk[2], $fk[3]]));
            $this->addForeignKey(
                'FK_' . $md5name,
                $fk[0],
                $fk[1],
                $fk[2],
                $fk[3]
            );
            $this->createIndex(
                'IDX_' .$md5name,
                $fk[0],
                $fk[1]
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        foreach ($this->fk_data as $fk) {
            $md5name = md5(implode('_', [$fk[0], $fk[1], $fk[2], $fk[3]]));
            $this->dropForeignKey('FK_' . $md5name, $fk[0]);
        }
        $this->dropTable('dromru_user_complectation');
        $this->dropTable('dromru_user_complectation_map');
        $this->dropTable('dromru_user_modification_map');
    }

}
