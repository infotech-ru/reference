<?php

use yii\db\Migration;

class m170724_133626_create_table_common_skin extends Migration
{
    public function safeUp(): void
    {
        $this->alterColumn('eqt_skin', 'model_id', $this->integer());
        $this->addColumn('eqt_skin', 'common_skin_id', $this->integer()->after('model_id'));
        $this->addForeignKey('eqt_fk_skin_common_skin', 'eqt_skin', 'common_skin_id', 'eqt_skin', 'id');
    }

    public function safeDown(): void
    {
        $this->dropForeignKey('eqt_fk_skin_common_skin', 'eqt_skin');
        $this->dropColumn('eqt_skin', 'common_skin_id');
        $this->delete('eqt_skin', 'model_id IS NULL');
        $this->dropForeignKey('eqt_fk_skin_model', 'eqt_skin');
        $this->alterColumn('eqt_skin', 'model_id', $this->integer()->notNull());
        $this->addForeignKey('eqt_fk_skin_model', 'eqt_skin', 'model_id', 'models', 'id');
    }
}
