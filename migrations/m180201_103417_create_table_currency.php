<?php

use yii\db\Migration;

class m180201_103417_create_table_currency extends Migration
{
    public function safeUp(): void
    {
        $this->createTable(
            'currency',
            [
                'number_code' => $this->char(3)->notNull()->unique(),
                'string_code' => $this->char(3)->notNull()->unique(),
                'name' => $this->string()->notNull(),
                'short_name' => $this->string(5)->notNull(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
    }

    public function safeDown(): void
    {
        $this->dropTable('currency');
    }
}
