<?php

use yii\db\Migration;

/**
 * Class m181022_125349_create_model_mapping
 */
class m181022_125349_aeb_create_model_mapping extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('aeb_model_mapping', [
            'id' => $this->primaryKey(),
            'brand_id' => $this->integer()->notNull(),
            'model_id' => $this->integer()->notNull(),
            'name' => $this->string(500)->notNull(),
            'created_at' => $this->dateTime(),
        ], 'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('aeb_model_mapping');
    }
}
