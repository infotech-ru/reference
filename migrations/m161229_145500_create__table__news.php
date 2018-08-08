<?php

class m161229_145500_create__table__news extends \yii\db\Migration
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
