<?php

use yii\db\Migration;

class m240322_142313_i18n_init extends Migration
{
    public function safeUp(): void
    {
        $this->createTable(
            'translation_category',
            [
                'id' => $this->primaryKey(),
                'key' => $this->string()->notNull(),
                'parent_id' => $this->integer(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci',
        );

        $this->createIndex('idx_translation_category', 'translation_category', 'key', true);
        $this->createIndex('idx_translation_parent_id', 'translation_category', 'parent_id');

        $this->addForeignKey(
            'fk_translation_category_parent',
            'translation_category',
            'parent_id',
            'translation_category',
            'id',
            'RESTRICT',
            'RESTRICT',
        );
    }

    public function safeDown(): void
    {
        $this->dropForeignKey('fk_translation_category_parent', 'translation_category');
        $this->dropTable('translation_category');
    }
}
