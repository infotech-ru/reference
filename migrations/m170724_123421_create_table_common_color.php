<?php

use yii\db\Migration;

class m170724_123421_create_table_common_color extends Migration
{
    public function safeUp(): void
    {
        $this->alterColumn('eqt_color', 'model_id', $this->integer());
        $this->addColumn('eqt_color', 'common_color_id', $this->integer()->after('model_id'));
        $this->addForeignKey('eqt_fk_color_common_color', 'eqt_color', 'common_color_id', 'eqt_color', 'id');
    }

    public function safeDown(): void
    {
        $this->dropForeignKey('eqt_fk_color_common_color', 'eqt_color');
        $this->dropColumn('eqt_color', 'common_color_id');
        $this->delete('eqt_color', 'model_id is null');
        $this->dropForeignKey('eqt_fk_color_model', 'eqt_color');
        $this->alterColumn('eqt_color', 'model_id', $this->integer()->notNull());
        $this->addForeignKey('eqt_fk_color_model', 'eqt_color', 'model_id', 'models', 'id');
    }
}
