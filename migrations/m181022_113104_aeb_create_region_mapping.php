<?php

use yii\db\Migration;

/**
 * Class m181022_113104_create_region_mapping
 */
class m181022_113104_aeb_create_region_mapping extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('aeb_region_mapping', [
            'id' => $this->primaryKey(),
            'region_id' => $this->integer()->notNull(),
            'name' => $this->string(500)->notNull(),
            'created_at' => $this->dateTime(),
        ], 'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('aeb_region_mapping');
    }
}
