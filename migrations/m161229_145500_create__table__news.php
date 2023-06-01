<?php

use yii\db\Migration;

class m161229_145500_create__table__news extends Migration
{
    public function safeUp(): void
    {
        $this->createTable(
            'news',
            [
                'id' => $this->primaryKey(),
                'date_public' => $this->dateTime(),
                'title' => $this->string(255)->notNull(),
                'content' => $this->text()->notNull(),
            ]
        );
    }

    public function safeDown(): void
    {
        $this->dropTable('news');
    }
}
