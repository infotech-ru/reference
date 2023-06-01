<?php

use yii\db\Migration;

/**
 * Class m220211_123732_add_column_model_alias_dealerpoint_code
 */
class m220211_123732_add_column_model_alias_dealerpoint_code extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn('model_alias', 'dealerpoint_code', $this->string());
    }

    public function safeDown(): void
    {
        $this->dropColumn('model_alias', 'dealerpoint_code');
    }
}
