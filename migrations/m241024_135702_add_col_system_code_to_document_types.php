<?php

use yii\db\Migration;

/**
 * Class m241024_135702_add_col_system_code_to_document_types
 */
class m241024_135702_add_col_system_code_to_document_types extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('common_document_types', 'system_code', $this->integer()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('common_document_types', 'system_code');
    }
}
