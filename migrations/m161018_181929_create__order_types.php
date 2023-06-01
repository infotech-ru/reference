<?php

use yii\db\Migration;

class m161018_181929_create__order_types extends Migration
{
    public function safeUp(): void
    {
        $this->createTable(
            'order_types',
            [
                'code' => $this->string()->notNull(),
                'brand_id' => $this->integer()->notNull(),
                'name' => $this->string()->notNull(),
                'ord' => $this->integer()->notNull(),
            ]
        );
        $this->createIndex('idx', 'order_types', ['code', 'brand_id'], true);
    }

    public function safeDown(): void
    {
        $this->dropTable('order_types');
    }
}
