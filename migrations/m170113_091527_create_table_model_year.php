<?php

use yii\db\Migration;

class m170113_091527_create_table_model_year extends Migration
{
    public function up()
    {
        $this->createTable(
            'model_year',
            [
                'id' => $this->primaryKey(),
                'model_id' => $this->integer()->notNull(),
                'year' => $this->integer()->notNull(),
                'is_recent' => $this->boolean()->notNull()->defaultValue(1),
                'is_default' => $this->boolean()->notNull()->defaultValue(0),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
        $this->addForeignKey('fk_model_year_model', 'model_year', 'model_id', 'models', 'id', null, 'CASCADE');
        $this->createIndex('uq_model_year', 'model_year', ['model_id', 'year'], true);
    }

    public function down()
    {
        $this->dropTable('model_year');
    }
}
