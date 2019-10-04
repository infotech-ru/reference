<?php

use yii\db\Migration;

class m161103_100330_alter_fk_option_model_option extends Migration
{
    public function up()
    {
        $this->dropForeignKey('eqt_fk_option_model_option', 'eqt_option');
        $this->addForeignKey(
            'eqt_fk_option_model_option',
            'eqt_option',
            'model_option_id',
            'eqt_model_option',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->dropForeignKey(
            'eqt_fk_model_option_option_group',
            'eqt_model_option'
        );
        $this->addForeignKey(
            'eqt_fk_model_option_option_group',
            'eqt_model_option',
            'option_group_id',
            'eqt_option_group',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function down()
    {
    }
}
