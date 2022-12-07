<?php

use yii\db\Migration;

/**
 * Class m221207_110447_create_model_country_table
 */
class m221207_110447_create_model_country_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'model_country',
            [
                'model_id' => $this->integer()->notNull(),
                'country_id' => $this->integer()->notNull(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );

        $this->addPrimaryKey('PRIMARY KEY', 'model_country', ['model_id', 'country_id']);

        $this->addForeignKey(
            'fk_model_country_model',
            'model_country',
            'model_id',
            'models',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_model_country_country',
            'model_country',
            'country_id',
            'countries',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('model_country');
    }
}
