<?php

use yii\db\Migration;

/**
 * Class m241023_135016_create_table_common_document_types
 */
class m241023_135016_create_table_common_document_types extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('common_document_types', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'context' => $this->integer()->notNull(),
            'is_active' => $this->boolean()->notNull()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('common_document_types');
    }
}
