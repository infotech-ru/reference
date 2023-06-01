<?php

use yii\db\Migration;

class m151207_120819_create_table_image extends Migration
{
    public function safeUp(): void
    {
        $this->createTable(
            'eqt_image',
            [
                'id' => $this->primaryKey(),
                'body_id' => $this->integer()->notNull(),
                'model_id' => $this->integer()->notNull(),
                'url' => $this->string()->notNull(),
                'is_main' => $this->boolean()->notNull(),
                'created_at' => $this->dateTime()->notNull(),
                'updated_at' => $this->dateTime(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
        $this->addForeignKey('eqt_fk_image_model', 'eqt_image', 'model_id', 'models', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('eqt_fk_image_body', 'eqt_image', 'body_id', 'bodies', 'id', 'CASCADE', 'CASCADE');
    }

    public function safeDown(): void
    {
        $this->dropForeignKey('eqt_fk_image_body', 'eqt_image');
        $this->dropForeignKey('eqt_fk_image_model', 'eqt_image');
        $this->dropTable('eqt_image');
    }
}
