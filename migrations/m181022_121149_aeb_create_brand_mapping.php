<?php

use yii\db\Migration;

/**
 * Class m181022_121149_create_brand_mapping
 */
class m181022_121149_aeb_create_brand_mapping extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('aeb_brand_mapping', [
            'id' => $this->primaryKey(),
            'brand_id' => $this->integer()->notNull(),
            'name' => $this->string(500)->notNull(),
            'created_at' => $this->dateTime(),
        ], 'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('aeb_brand_mapping');
    }
}
