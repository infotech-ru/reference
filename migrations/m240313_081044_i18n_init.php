<?php

use yii\db\Migration;

class m240313_081044_i18n_init extends Migration
{
    public function safeUp(): void
    {
        $this->createTable(
            'translation_source_message',
            [
                'id' => $this->primaryKey(),
                'category' => $this->string(),
                'message' => $this->text()->notNull(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci',
        );

        $this->createIndex('idx_translation_source_message_category', 'translation_source_message', 'category');


        $this->createTable(
            'translation_message',
            [
                'id' => $this->integer()->notNull(),
                'language' => $this->string(16)->notNull(),
                'translation' => $this->text(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci',
        );

        $this->addPrimaryKey('pk_translation_message_id_language', 'translation_message', ['id', 'language']);

        $this->addForeignKey(
            'fk_translation_message_source_message',
            'translation_message',
            'id',
            'translation_source_message',
            'id',
            'CASCADE',
            'RESTRICT',
        );

        $this->createIndex('idx_translation_message_language', 'translation_message', 'language');
    }

    public function safeDown(): void
    {
        $this->dropForeignKey('fk_translation_message_source_message', 'translation_message');
        $this->dropTable('translation_message');

        $this->dropTable('translation_source_message');
    }
}
