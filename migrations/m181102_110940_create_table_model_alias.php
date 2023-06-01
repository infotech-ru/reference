<?php

use yii\db\Migration;

/**
 * Class m181102_110940_create_table_model_alias
 */
class m181102_110940_create_table_model_alias extends Migration
{
    public function safeUp(): void
    {
        $this->createTable(
            'model_alias',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                'brand_id' => $this->integer()->unsigned()->notNull(),
                'model_id' => $this->integer()->notNull(),
                'generation_id' => $this->integer(),
                'serie_id' => $this->integer(),
                'status' => $this->tinyInteger()->notNull(),
                'created_at' => $this->dateTime()->notNull(),
                'updated_at' => $this->dateTime()->notNull(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
        $this->addForeignKey('fk_model_alias_brand_id', 'model_alias', 'brand_id', 'brands', 'id');
        $this->addForeignKey('fk_model_alias_model_id', 'model_alias', 'model_id', 'models', 'id');
        $this->addForeignKey(
            'fk_model_alias_generation_id',
            'model_alias',
            'generation_id',
            'car_generation',
            'id_car_generation'
        );
        $this->addForeignKey('fk_model_alias_serie_id', 'model_alias', 'serie_id', 'car_serie', 'id_car_serie');
    }

    public function safeDown(): void
    {
        $this->dropTable('model_alias');
    }
}
