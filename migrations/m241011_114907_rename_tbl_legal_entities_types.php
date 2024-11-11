<?php

use yii\db\Migration;

/**
 * Class m241011_114907_rename_tbl_legal_entities_types
 */
class m241011_114907_rename_tbl_legal_entities_types extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameTable('legal_entities_types', 'legal_entity_type');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameTable('legal_entity_type', 'legal_entities_types');
    }
}
