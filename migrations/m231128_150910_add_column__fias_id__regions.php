<?php

use yii\db\Migration;

/**
 * Class m231128_150910_add_column__fias_id__regions
 */
class m231128_150910_add_column__fias_id__regions extends Migration
{
    public function safeUp()
    {
        $this->addColumn('regions', 'fias_id', $this->string(36)->null()->after('kladr_code'));
        $this->createIndex('idx--regions--fias_id', 'regions', ['fias_id'], true);
    }

    public function safeDown()
    {
        $this->dropIndex('idx--regions--fias_id', 'regions');
        $this->dropColumn('regions', 'fias_id');
    }
}
