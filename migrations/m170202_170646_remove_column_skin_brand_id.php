<?php

use yii\db\Migration;

class m170202_170646_remove_column_skin_brand_id extends Migration
{
    public function safeUp(): void
    {
        $this->dropForeignKey('eqt_fk_skin_brand', 'eqt_skin');
        $this->dropColumn('eqt_skin', 'brand_id');
    }

    public function safeDown(): void
    {
        $this->addColumn('eqt_skin', 'brand_id', $this->integer()->unsigned()->notNull());
        $this->addForeignKey(
            'eqt_fk_skin_brand',
            'eqt_skin',
            'brand_id',
            'brands',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }
}
