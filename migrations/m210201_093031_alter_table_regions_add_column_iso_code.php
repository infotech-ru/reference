<?php

use yii\db\Migration;

/**
 * Class m210201_093031_alter_table_regions_add_column_iso_code
 */
class m210201_093031_alter_table_regions_add_column_iso_code extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('regions', 'iso_code', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('regions', 'iso_code');
    }
}
