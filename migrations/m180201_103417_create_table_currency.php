<?php

use yii\db\Migration;

class m180201_103417_create_table_currency extends Migration
{
    const TABLE_NAME = 'currency';

    public function safeUp()
    {
        $this->createTable(
            self::TABLE_NAME,
            [
                'number_code' => $this->char(3)->notNull()->unique(),
                'string_code' => $this->char(3)->notNull()->unique(),
                'name' => $this->string()->notNull(),
                'short_name' => $this->string(5)->notNull(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
    }

    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }
}
