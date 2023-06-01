<?php

use yii\db\Migration;

class m161102_163536_add_column_option_model_option_id extends Migration
{
    public function up()
    {
        $this->addColumn('eqt_option', 'model_option_id', $this->integer()->notNull()->after('equipment_id'));
        $this->addForeignKey(
            'eqt_fk_option_model_option',
            'eqt_option',
            'model_option_id',
            'eqt_model_option',
            'id'
        );
    }

    public function down()
    {
        $this->dropForeignKey('eqt_fk_option_model_option', 'eqt_option');
        $this->dropColumn('eqt_option', 'model_option_id');
    }
}
