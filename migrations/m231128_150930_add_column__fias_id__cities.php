<?php

use yii\db\Migration;

/**
 * Class m231128_150930_add_column__fias_id__cities
 */
class m231128_150930_add_column__fias_id__cities extends Migration
{
    public function safeUp()
    {
        $this->addColumn('cities', 'fias_id', $this->string(36)->null()->after('is_regional_center'));
        $this->createIndex('idx--cities--fias_id', 'cities', ['fias_id'], true);
    }

    public function safeDown()
    {
        $this->dropIndex('idx--cities--fias_id', 'cities');
        $this->dropColumn('cities', 'fias_id');
    }
}
