<?php

use yii\db\Migration;

class m161229_145500_create__table__news extends Migration
{
    public function up()
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

    public function down()
    {
        $this->dropTable('news');
    }
}
