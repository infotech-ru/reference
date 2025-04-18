<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sls_toyota_brand}}`.
 */
class m250411_100647_create_sls_toyota_brand_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('sls_toyota_brand', [
            'id' => $this->primaryKey(),
            'guid' => $this->string()->notNull()->unique(),
            'brand_id' => $this->integer()->notNull(),
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('sls_toyota_brand');
    }
}
