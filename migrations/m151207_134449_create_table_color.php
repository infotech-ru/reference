<?php

use yii\db\Migration;

class m151207_134449_create_table_color extends Migration
{
    public function safeUp(): void
    {
        $this->createTable(
            'eqt_color',
            [
                'id' => $this->primaryKey(),
                'brand_id' => 'int unsigned not null',
                'code' => $this->string()->notNull(),
                'name' => $this->string()->notNull(),
                'created_at' => $this->dateTime()->notNull(),
                'updated_at' => $this->dateTime(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
        $this->addForeignKey(
            'eqt_fk_color_brand',
            'eqt_color',
            'brand_id',
            'brands',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addColumn('eqt_image', 'color_id', $this->integer()->notNull());
        $this->addForeignKey(
            'eqt_fk_image_color',
            'eqt_image',
            'color_id',
            'eqt_color',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown(): void
    {
        $this->dropForeignKey('eqt_fk_image_color', 'eqt_image');
        $this->dropColumn('eqt_image', 'color_id');
        $this->dropForeignKey('eqt_fk_color_brand', 'eqt_color');
        $this->dropTable('eqt_color');
    }
}
