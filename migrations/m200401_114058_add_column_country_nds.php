<?php

use yii\db\Migration;

/**
 * Class m200401_114058_add_column_country_nds
 */
class m200401_114058_add_column_country_nds extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->addColumn('countries', 'nds', $this->float()->comment('НДС в процентах'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropColumn('countries', 'nds');
    }
}
