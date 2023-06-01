<?php

use yii\db\Migration;

/**
 * Class m180112_140433_create_table_russian_name
 */
class m180112_140433_create_table_russian_name extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp(): void
    {
        $this->createTable(
            'russian_name',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string(100)->notNull(),
                'sex' => $this->char(1),
            ]
        );
        $this->createIndex('idx_russian_name_name', 'russian_name', 'name');
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): void
    {
        $this->dropTable('russian_name');
    }
}
