<?php

use yii\db\Migration;

/**
 * Class m181107_234320_create_aeb_region_upload_history
 */
class m181107_234320_aeb_create_aeb_region_upload_history extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('aeb_region_upload_history', [
            'id' => $this->primaryKey(),
            'status' => $this->integer()->notNull(),
            'year' => $this->integer()->notNull(),
            'import_status' => $this->integer()->notNull()->defaultValue(0),
            'imported_success' => $this->integer()->notNull()->defaultValue(0),
            'imported_errors' => $this->integer()->notNull()->defaultValue(0),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime(),
        ], 'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('aeb_region_upload_history');
    }
}
