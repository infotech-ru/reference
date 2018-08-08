<?php

use yii\db\Migration;

class m161102_142113_create_table_model_option extends Migration
{
    public function up()
    {
        $this->createTable(
            'eqt_model_option',
            [
                'id' => $this->primaryKey(),
                'model_id' => $this->integer()->notNull(),
                'option_group_id' => $this->integer()->notNull(),
                'name' => $this->string()->notNull(),
                'created_at' => $this->dateTime()->notNull(),
                'updated_at' => $this->dateTime(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
        $this->addForeignKey('eqt_fk_model_option_model', 'eqt_model_option', 'model_id', 'models', 'id');
        $this->addForeignKey(
            'eqt_fk_model_option_option_group',
            'eqt_model_option',
            'option_group_id',
            'eqt_option_group',
            'id'
        );
    }

    public function down()
    {
        $this->dropTable('eqt_model_option');
    }
}
