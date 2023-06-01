<?php

use yii\db\Migration;

class m151221_112806_create_table_skin extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'eqt_skin',
            [
                'id' => $this->primaryKey(),
                'brand_id' => 'int unsigned not null',
                'name' => $this->string()->notNull(),
                'created_at' => $this->dateTime()->notNull(),
                'updated_at' => $this->dateTime(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
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

    public function safeDown()
    {
        $this->dropForeignKey('eqt_fk_skin_brand', 'eqt_skin');
        $this->dropTable('eqt_skin');
    }
}
