<?php

use yii\db\Migration;

/**
 * Class m181122_101654_create_table_news_brand
 */
class m181122_101654_create_table_news_brand extends Migration
{
    public function safeUp(): void
    {
        $this->createTable('news_brand', [
            'news_id' => $this->integer()->notNull(),
            'brand_id' => $this->integer()->unsigned()->notNull(),
            'PRIMARY KEY(news_id, brand_id)',
        ], 'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci');

        $this->addForeignKey('fk_news_brand_news_id', 'news_brand', 'news_id', 'news', 'id');
        $this->addForeignKey('fk_news_brand_brand_id', 'news_brand', 'brand_id', 'brands', 'id');
    }

    public function safeDown(): void
    {
        $this->dropTable('news_brand');
    }
}
