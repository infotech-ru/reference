<?php

use yii\db\Migration;

class m170202_170858_add_column_skin_model_id extends Migration
{
    public function up()
    {
        $this->delete('eqt_offer');
        $this->delete('eqt_skin');
        $this->addColumn('eqt_skin', 'model_id', $this->integer()->notNull()->after('id'));
        $this->addForeignKey('eqt_fk_skin_model', 'eqt_skin', 'model_id', 'models', 'id', null, 'CASCADE');
        $this->addColumn('eqt_skin', 'code', $this->string()->after('model_id'));
    }

    public function down()
    {
        $this->dropColumn('eqt_skin', 'code');
        $this->dropForeignKey('eqt_fk_skin_model', 'eqt_skin');
        $this->dropColumn('eqt_skin', 'model_id');
    }
}
