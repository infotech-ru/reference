<?php

use yii\db\Migration;

class m170929_144533_assign_news_tags extends Migration
{
    public function safeUp()
    {
        $this->update('news', ['tags_bitmap' => -1], 'tags_bitmap = 0');
    }
}
