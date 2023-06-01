<?php

use yii\db\Migration;

/**
 * Class m210216_130442_add_english_name_column_in_cities_table
 */
class m210216_130442_add_english_name_column_in_cities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->addColumn('cities', 'english_name', $this->string()->null()->defaultValue(null)->after('name'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropColumn('cities', 'english_name');
    }
}
