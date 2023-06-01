<?php

use yii\db\Migration;

/**
 * Class m180710_081252_add_column_region_status
 */
class m180710_081252_add_column_regions_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->addColumn('regions', 'status', $this->smallInteger()->notNull()->after('name'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropColumn('regions', 'status');
    }
}
