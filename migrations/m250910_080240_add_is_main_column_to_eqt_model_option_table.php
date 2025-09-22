<?php

use yii\db\Migration;

class m250910_080240_add_is_main_column_to_eqt_model_option_table extends Migration
{
    public function up()
    {
        $this->addColumn('eqt_model_option', 'is_main', $this->boolean()->notNull()->defaultValue(0));
        $this->update('eqt_model_option', ['is_main' => 1]);
    }

    public function down()
    {
        $this->dropColumn('eqt_model_option', 'is_main');
    }
}
