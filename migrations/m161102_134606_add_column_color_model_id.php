<?php

use yii\db\Migration;

class m161102_134606_add_column_color_model_id extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn('eqt_color', 'model_id', $this->integer()->notNull()->after('brand_id'));
        $this->delete('eqt_color', 'model_id=0');
        $this->addForeignKey('eqt_fk_color_model', 'eqt_color', 'model_id', 'models', 'id');
        $this->dropForeignKey('eqt_fk_color_brand', 'eqt_color');
        $this->dropColumn('eqt_color', 'brand_id');
    }

    public function safeDown(): void
    {
        $this->delete('eqt_color');
        $this->addColumn('eqt_color', 'brand_id', $this->integer()->unsigned()->after('id'));
        $this->addForeignKey('eqt_fk_color_brand', 'eqt_color', 'brand_id', 'brands', 'id');
        $this->dropForeignKey('eqt_fk_color_model', 'eqt_color');
        $this->dropColumn('eqt_color', 'model_id');
    }
}
