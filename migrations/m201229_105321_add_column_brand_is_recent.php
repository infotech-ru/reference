<?php

use yii\db\Migration;

/**
 * Class m201229_105321_add_column_brand_is_recent
 */
class m201229_105321_add_column_brand_is_recent extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->addColumn('brands', 'is_recent', $this->boolean()->notNull()->defaultValue(1));
        $this->alterColumn('brands', 'is_recent', $this->boolean()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropColumn('brands', 'is_recent');
    }
}
