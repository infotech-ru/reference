<?php

use yii\db\Migration;

class m170928_135826_add_news_tags extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn(
            'news',
            'tags_bitmap',
            'BIGINT DEFAULT 0 COMMENT "Битовая маска назначенных тэгов (см. класс \app\models\NewsTag)" 
            AFTER `date_public`'
        );
    }

    public function safeDown(): void
    {
        $this->dropColumn('news', 'tags_bitmap');
    }
}
