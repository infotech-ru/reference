<?php

use yii\db\Migration;

/**
 * Class m181122_142615_add_column_cities_is_regional_center
 */
class m181122_142615_add_column_cities_is_regional_center extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn('cities', 'is_regional_center', $this->boolean()->notNull());
    }

    public function safeDown(): void
    {
        $this->dropColumn('cities', 'is_regional_center');
    }
}
