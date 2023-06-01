<?php

use yii\db\Migration;

/**
 * Class m180703_145223_add_columns_regions_okato
 */
class m180703_145223_add_columns_regions_okato extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->addColumn('regions', 'okato', $this->char(2));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropColumn('regions', 'okato');
    }
}
