<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%model_alias_country}}`.
 */
class m230127_142334_create_model_alias_country_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'model_alias_country',
            [
                'model_alias_id' => $this->integer()->notNull(),
                'country_id' => $this->integer()->notNull(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );

        $this->addPrimaryKey('PRIMARY KEY', 'model_alias_country', ['model_alias_id', 'country_id']);

        $this->addForeignKey(
            'fk_model_alias_country_model_alias',
            'model_alias_country',
            'model_alias_id',
            'model_alias',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_model_alias_country_country',
            'model_alias_country',
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
        $this->dropTable('model_alias_country');
    }
}
